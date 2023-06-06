<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    "name" => 'Hello world!',
    'language' => 'ro',
    //'defaultRoute' => 'site/login',
    //'layout' => 'main',
//    'layout' => 'base',
//    'layoutPath' => '', //global
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
     //'defaultRoute' => 'article/hello',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'pAGiOGTvsrPJPXXg5Aa7h89-A3e3ae8r',
            'parsers' => [
              'application/json' => \yii\web\JsonParser::class,
            ],
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
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@app/mail',
            // send all mails to a file by default.
            'useFileTransport' => true,
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
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],

//        'assetManager' => [
//            'class' => 'app\components\AssetManager',
////            'appendTimestamp' => true,
//        ],
//
//        'test' => [
//            'class' => 'app\components\TestComponent',
//]

    ],
    'params' => $params,
    'on beforeAction' => function(){
    //echo Yii::$app->view->render('about'); // ERROR, the file about is not found
//        echo Yii::$app->view->render('@app/views/page/about');
    }
//    'on beforeAction' => function(){
//    echo '<pre><br><br><br><br>';
//    var_dump("App before action");
//    echo '</pre>';
//
//    Yii::$app->controller->on(\yii\web\Controller::EVENT_BEFORE_ACTION, function (){
//        echo '<pre>';
//        var_dump("Controller before action form ->on method");
//        echo '</pre>';
//    });
//    }
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
