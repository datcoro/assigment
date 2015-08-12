<?php

namespace app\controllers;

use app\models\CreateUser;
use app\models\User;
use app\models\Roles;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

class UserController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'edit', 'delete'],
                'rules' => [
                    [
                        'allow' => false,
                        'actions' => ['login'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['create', 'edit', 'delete'],
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

    public function actionIndex()
    {
        $lst = User::find()->where(['record_status' => 0])
            ->all();
        return $this->render('index', ['lst' => $lst]);
    }

    public function actionEdit($id = null)
    {

        //$lstLine = Lines::find()->where([RECORD_STATUS => STATUS_NORMAL])->all();
        $model = User::findOne($id);
        //$listRole = Roles::find()->all();
        if ($model->load(Yii::$app->request->post())) {
            $model->password = sha1($model->password);
            $model->save();
            return $this->redirect(['user/index']);
        } 
        else {
            //$model->password = null;
            return $this->render('edit', [
                'edit' => $model,
                //'showRole'=>$listRole,
            ]);
        }
    }

    public function actionCreate() {
        $model = new User();
        if($model->load(Yii::$app->request->post())) {
            if($model->validate()) {

                $existed = User::find()->where(['username'=>$model->username, 'record_status'=>0])->all();
                

                if(count($existed) == 0){
                    $model->password = sha1($model->password);
                    $model->record_status = 0;
                    if($model->save()){
                        return $this->redirect(['user/index']);    
                    }
                }
                return $this->render('create',['user' => $model, 'msg'=>'have some error!!!']); 
                
            }
            
        } else {
            return $this->render('create',['user' => $model]);
        }
    }

    public function actionDelete($id) {
        $user = User::findOne($id);
        if(!empty($user)) {
            $user->record_status = 1;
            if($user->save()) {
                return $this->redirect('index');
            }
        }
    }

    public function actionPreview($id) {
        $model = User::findOne($id);
        return $this->render('preview', [
                'model' => $model,
        ]);
    }

}
