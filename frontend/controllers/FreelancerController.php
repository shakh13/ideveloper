<?php

namespace frontend\controllers;

use Yii;
use yii\filters\AccessControl;

class FreelancerController extends \yii\web\Controller
{

    public function beforeAction($action)
    {
        if (Yii::$app->user->identity->profile->role == 2){
            $this->redirect(['/profile']);
            return parent::beforeAction($action);
        }

        $this->layout = 'freelancer';

        return parent::beforeAction($action); // TODO: Change the autogenerated stub
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

}
