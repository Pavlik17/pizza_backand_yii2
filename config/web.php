<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            'cookieValidationKey' => 'yYy4YYYX8lYyYyQOl8vOcO6ROo7i8twO',
            'baseUrl' => '',
            'enableCsrfValidation' => false,
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'response' => [
            'class' => 'yii\web\Response',
            'on beforeSend' => function ($event) {
                $response = $event->sender;
                $response->headers->add('Access-Control-Allow-Origin', 'http://localhost:5173');
                $response->headers->add('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
                $response->headers->add('Access-Control-Allow-Headers', 'Origin, X-Requested-With, Content-Type, Accept');
            },
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

                '' => 'product/index',
                '<controller:\w+>/<action:\w+>/' => '<controller>/<action>',
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'products',
                    'prefix' => '',
                    'extraPatterns' => [
                        'GET  index'=> 'product/product',

                '<controller:\w+>/<action:\w+>/' => '<controller>/<action>',
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'product',
                    'prefix' => '',
                    'extraPatterns' => [
                        'GET index'=> 'product/product',
                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'product',
                    'prefix' =>'',
                    'extraPatterns' => [
                        'GET index' => 'product/category',
                    ],
                ],
            ],
        ],
    ],
    'params' => $params,

];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.

        //'allowedIPs' => ['127.0.0.1', '::1'],

        'allowedIPs' => ['*', '::1'],

    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
