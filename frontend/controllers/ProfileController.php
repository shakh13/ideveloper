<?php

namespace frontend\controllers;

use common\models\Order;
use common\models\Project;
use Yii;
use yii\filters\AccessControl;

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
        return $this->render('index');
    }

    public function actionLogout(){
        Yii::$app->user->logout();
        return $this->goHome();
    }

    public function actionMakeOrder(){
        $model = new Project();
        return $this->render('makeproject', [
            'model' => $model,
        ]);
    }

}
