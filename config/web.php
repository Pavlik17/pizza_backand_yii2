<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'params' => $params,
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'corsManager' => [
            'class' => \yii\filters\Cors::class,
            'cors' => [
                'Origin' => ['http://localhost:5173'],
                'Access-Control-Request-Method' => ['GET', 'POST', 'OPTIONS'],
                'Access-Control-Allow-Credentials' => true,
                'Access-Control-Allow-Headers' => ['Content-Type', 'Authorization'],
            ],
        ],
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
                if (Yii::$app->request->isOptions) {
                    $response->statusCode = 200;
                    $response->data = []; // Пустой ответ
                    $response->send();
                }
            },
        ],
        
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'enableSession' => false,
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
                       'GET index'=> 'product/product',
                   ],
               ],
               [
                   'class' => 'yii\rest\UrlRule',
                   'controller' => 'product',
                   'prefix' => '',
                   'extraPatterns' => [
                       'GET index' => 'product/category',
                   ],
               ],
               [
                   'class' => 'yii\rest\UrlRule',
                   'controller' => 'basket',
                   'prefix' => '',
                   'extraPatterns' => [
                       'POST send-order' => 'basket/send-order',
                   ],
               ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'admin',
                    'prefix' => '',
                    'extraPatterns' => [
                        'GET authorization' => 'admin/authorization',
                    ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'register',
                    'prefix' => '',
                    'extraPatterns' => [
                        'POST register' => 'register/register',
                ],
                ],
                //test
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'test',
                    'prefix' => '',
                    'extraPatterns' => [
                        'GET test' => '/test/test',
                ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'auth',
                    'prefix' => '',
                    'extraPatterns' => [
                        'POST auth' => 'auth/auth',
                ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'reset-password',
                    'prefix' => '',
                    'extraPatterns' => [
                        'GET reset-password' => 'reset-password/reset-password',
                ],
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'check-token',
                    'prefix' => '',
                    'extraPatterns' => [
                        'POST check-token' => 'check-token/check-token',
                    ],  
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'admin/add-image-stocks-populars/upload/',
                    'prefix' => '',
                ],
                //контроллеры на получение изображений в admin-panel
                //акционные
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'get-images-stocks',
                    'prefix' => '',
                    'extraPatterns' => [
                        'GET get-images-stocks' => 'admin/get-images-stocks/get-images',
                    ],  
                ],
                //популярные
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => 'get-images-populars',
                    'prefix' => '',
                    'extraPatterns' => [
                        'GET get-images-populars' => 'admin/get-images-populars/get-images',
                    ],  
                ],
                //изображения меню
       ],
    ],
    
],
    
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
