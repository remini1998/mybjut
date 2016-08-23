<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\EntryForm;
use app\models\Admin;
use app\models\UploadForm;
use yii\web\UploadedFile;


class DefaultController extends Controller
{
    public $layout = 'adminhome';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout','index','home'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [   
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [   
                        'actions' => ['home'],
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
        $this->layout = 'adminindex';
        return $this->render('index');
    }

    public function actionCraft()
    {
        $this->layout = false;
        return $this->render('minecraft');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionHome()
    {
        $this->layout = 'adminhome';
        return $this->render('home');
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionTestuser()
    {
        Yii::$app->user->say();
    }

    public function actionTestdb()
    {
        $connection = Yii::$app->db; //连接

        $connection->open();

        $sql = "SELECT * FROM `admin` ORDER BY `admin_fname` DESC";

        $command = $connection->createCommand($sql);

        $result = $command->queryAll();

        print_r($result);

        $connection->close();        
        // return $this->render('test');
    }

    public function actionUpload()
    {
        $model = new UploadForm();


        // 如果是POST请求
        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                // 文件上传成功
                return;
            }
        }

        return $this->render('upload', ['model' => $model]);
    }

}
