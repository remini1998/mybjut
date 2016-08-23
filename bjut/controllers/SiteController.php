<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\EntryForm;
use app\models\Admin;

class SiteController extends Controller
{
    public $layout = 'bjut';
    public $adminphone = 123;
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout','testdb'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [   
                        'actions' => ['testdb'],
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
        $this->layout = 'bjut';
        return $this->render('index');
    }

    public function actionThing()
    {
        $this->layout = 'things';
        return $this->render('thing');
    }    

    public function actionIndex2()
    {
        $this->layout = 'fullpage';
        return $this->render('index2');
    }

    public function actionIndex3()
    {
        $this->layout = 'unslider';
        return $this->render('index3');
    }

    public function actionIndexshijian()
    {
        $this->layout = 'bjut';
        return $this->render('indexshijian');
    }

    public function actionClause()
    {
        $this->layout = 'bjut';
        return $this->render('clause');
    }


    public function actionLogin()
    {
        $this->layout = 'bjut';
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

    public function actionLogout()
    {
        $this->layout = 'bjut';
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $this->layout = 'bjut';
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        $this->layout = 'about';
        return $this->render('about');
    }

    public function actionTest()
    {
        $this->layout = 'bjut';
        return $this->render('test');
    }

    public function actionTestdb()
    {
        $this->layout = 'bjut';
        $connection = Yii::$app->db; //连接

        $connection->open();

        $sql = "SELECT * FROM `admin` ORDER BY `admin_fname` DESC";

        $command = $connection->createCommand($sql);

        $result = $command->queryAll();

        print_r($result);

        $connection->close();        
        // return $this->render('test');
    }

    public function actionSignup()
    {
        $this->layout = 'bjut';

        // if (!\Yii::$app->user->isGuest) {
        //     return $this->goHome();
        // }
        $model = new Admin;

        // 验证validate()时需要把验证码排除，即把要验证的数据放在中间
        if ($model->load(Yii::$app->request->post())) //&& $model->validate(array('admin_name','admin_email','admin_password')))
        {
            //$request = \Yii::$app->request;

            if (!$model->save())    // model->save()操作会再执行一遍 model->validate
            {
                print_r($model->getErrors());
                echo "<br><br><br><br><br><br>成功注册页";   // 这里应该干点什么
            }
            return $this->goHome();            // 成功注册页                      
        }
        else
        {
            return $this->render('signup',['model'=> $model,]);      // 失败，返回注册页
        }
    }
}
