<?php

namespace app\controllers;

use app\models\LineForm;
use app\models\Stations;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Lines;
use yii\web\UploadedFile;

class StationController extends Controller
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
        $lst = Stations::find()
            ->where([RECORD_STATUS => STATUS_NORMAL])
            ->orderBy(NAME)
            ->all();

        return $this->render('index', ['listLine' => $lst]);
    }

    public function actionCreate($id = null)
    {
        $lstLine = Lines::find()->where([RECORD_STATUS => STATUS_NORMAL])->all();

        $model = new Stations();
        if ($model->load(Yii::$app->request->post())) {
            if($model->validate()){

                $model->save();
                $id = $model->id;
                $model->file = UploadedFile::getInstance($model, 'file');
                if($model->file){
                    $id = $model->id;
                    $imageName = "station_".$id.'_'.getdate()[0];
                    $model->file->saveAs('uploads/'.$imageName.'.'.$model->file->extension);

                    $station = Stations::findOne($id);
                    $station->image = '@web/uploads/'.$imageName.'.'.$model->file->extension;
                    $station->save();
                }
                return $this->redirect(['station/index']);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'listLine' => $lstLine,
                'currentLine' => $id
            ]);
        }
    }

    public function actionEdit($id)
    {
        $model = Stations::findOne($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if($model->validate()){

                $model->save();
                $id = $model->id;
                $model->file = UploadedFile::getInstance($model, 'file');
                if($model->file){
                     $model->file->saveAs('uploads/station_'.$model->id.'_'.getdate()[0] . '.' . $model->file->extension);
                $model->image = '@web/uploads/station_'.$model->id.'_'.getdate()[0].'.'.$model->file->extension;
                $model->save();
               
                }
                return $this->redirect(['index']);
            }
        } else {

            return $this->render('edit', [
                'model' => $model,
            ]);
        }
    }

    public function actionPreview($id)
    {
        $model = Stations::findOne($id);


        return $this->render('preview', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {

        $model = Stations::findOne($id);
        if(!empty($model)){
            $model->record_status = STATUS_DELETED;
            if($model->save()) return $this->redirect(['station/index']);
        }
    }

}
