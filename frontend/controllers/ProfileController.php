<?php /** @noinspection ALL */

namespace frontend\controllers;

use common\models\Order;
use common\models\Project;
use Yii;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class ProfileController extends \yii\web\Controller
{

    public function beforeAction($action)
    {
        if (Yii::$app->user->identity->profile->role == 1){
            $this->redirect(['/freelancer']);
            return parent::beforeAction($action);
        }

        $this->layout = 'profile';

        return parent::beforeAction($action);
    }

    public function behaviors()
    {
        return [
           'access' => [
               'class' => AccessControl::className(),
               'rules' => [
                   [
                       'allow' => false,
                       'roles' => ['?']
                   ],
                   [
                       'allow' => true,
                       'roles' => ['@']
                   ]
               ]
           ]
        ];
    }

    public function actionIndex()
    {
        $user = Yii::$app->user->identity;
        $myprojects = Project::find()->where(['user_id' => $user->id])->orderBy('created_at')->all();

        return $this->render('index', [
            'user' => $user,
            'myprojects' => $myprojects,
        ]);
    }

    public function actionLogout(){
        Yii::$app->user->logout();
        return $this->goHome();
    }

    public function actionMakeOrder(){
        $model = new Project();

        if (Yii::$app->request->isPost){
            $model->load(Yii::$app->request->post());
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->user_id = Yii::$app->user->id;
            $model->status = 0;
            if ($model->upload()){
                if ($model->save()){
                    return $this->redirect(['/profile/order-in-payment', 'id' => $model->id]);
                }
            }

            print_r($model->errors);
        }

        return $this->render('makeproject', [
            'model' => $model,
        ]);
    }

    public function actionOrdersInPayment(){
       $user = Yii::$app->user->identity;

       $projects = Project::find()->where(['user_id' => $user->id, 'status' => 0])->orderBy('created_at')->all();
       return $this->render('ordersinpayment', [
           'user' => $user,
           'projects' => $projects
       ]);
    }

    public function actionOrderInPayment(){
        $oid = Yii::$app->request->get('id');
        if ($oid){
            $user = Yii::$app->user->identity;
            $project = Project::findOne([
                'id' => $oid,
                'user_id' => $user->id,
                'status' => 0
            ]);

            if ($project){
                return $this->render('orderinpayment', [
                    'user' => $user,
                    'project' => $project,
                ]);
            }
            else {
                throw new NotFoundHttpException('Заказ не найдено. Повторите попытку позже.');
            }
        }
        else {
            throw new NotFoundHttpException('Заказ не найдено. Повторите попытку позже.');
        }
    }

}
