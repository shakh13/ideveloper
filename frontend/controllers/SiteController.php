<?php
namespace frontend\controllers;

use common\models\Profile;
use common\models\User;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function beforeAction($action)
    {
        if (!Yii::$app->user->isGuest){
            if (isset(Yii::$app->user->identity->profile)){
                if (Yii::$app->user->identity->profile->role == 1){
                    $this->redirect(['/freelancer']);
                    return parent::beforeAction($action);
                }
                else {
                    if (Yii::$app->user->identity->profile->role == 2){
                        $this->redirect(['/profile']);
                        return parent::beforeAction($action);
                    }
                }
            }
        }
        return parent::beforeAction($action);
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session
                    ->setFlash('success'
                        , 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    // sendmail function here with user_id--------------------------------------------------------------
                    Yii::$app->mailer->compose()
                        ->setFrom('vip.shaxi@mail.ru')
                        ->setTo($user->email)
                        ->setSubject('iDeveloper - Activation page')
                        ->setTextBody($user->password_reset_token.' text')
                        ->setHtmlBody($user->password_reset_token.' html')
                        ->send();

                    Yii::$app->getUser()->logout();
                    return $this->render('sendmail_activation_code', [
                        'user' => $user,
                    ]);
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionProfileEdit(){
        $user_id = Yii::$app->request->get('userId');
        $activation_code = Yii::$app->request->get('activationCode');

        if ($user_id && $activation_code){
            $user = User::findOne(['id' => $user_id, 'password_reset_token' => $activation_code, 'status' => 0]);
            if ($user){

                $model = new Profile();

                return $this->render('activation_profile_edit', [
                    'user' => $user,
                    'activation_code' => $activation_code,
                    'model' => $model,
                ]);
            }
            else {
                throw new BadRequestHttpException('Вы не туда попали.');
            }
        }
        else {
            throw new BadRequestHttpException('Sorry!');
        }
    }

    public function actionActivateProfile(){
        $user_id = Yii::$app->request->post('user_id');
        $activation_code = Yii::$app->request->post('activation_code');

        if ($user_id && $activation_code){
            $user = User::findOne(['id' => $user_id, 'password_reset_token' => $activation_code, 'status' => 0]);
            if ($user){
                $profile = new Profile();
                $profile->user_id = $user_id;
                $profile->load(Yii::$app->request->post());

                // check validation ------------------------------------------------------------------------------------
                if ($profile->save()){
                    $user->password_reset_token = null;
                    $user->status = 10;
                    $user->save();
                    return $this->redirect(['/profile']);
                }
                else {
                    //print_r($profile->getErrors());
                    throw new BadRequestHttpException('Не удалось активировать аккаунт. Пожалуйста, попробуйте позже.');
                }
            }
            else {
                throw new BadRequestHttpException('Вы не туда попали.');
            }
        }
        else {
            throw new BadRequestHttpException('Sorry!');
        }
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session
                    ->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session
                    ->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
