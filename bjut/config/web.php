<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Admin',
        ],
        'article' => [
            'class' => 'app\modules\article\Article',
        ],
    ],
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'okkie',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [  
           'class' => 'yii\swiftmailer\Mailer',  
            'useFileTransport' =>false,//这句一定有，false发送邮件，true只是生成邮件在runtime文件夹下，不发邮件
           'transport' => [  
               'class' => 'Swift_SmtpTransport',  
               'host' => 'smtp.163.com',  //每种邮箱的host配置不一样
               'username' => 'wjchzndd@163.com',  
               'password' => '********',  
               'port' => '25',
               'encryption' => 'tls',],   
           'messageConfig'=>[
               'charset'=>'UTF-8',  
               'from'=>['wjchzndd@163.com'=>'笑忘书']  
               ],  
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
    ],
    'params' => $params,
    'aliases' => [
        '@bjuttest' => 'localhost/bjut/web',
        '@bjut' => 'http://www.mybjut.com',
        '@bjutlogo' => 'localhost/bjut/web/logo.png'
    ],

];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
