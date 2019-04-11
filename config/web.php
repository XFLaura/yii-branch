<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';


$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),//系统派生其他的路径 ：@app/runtime 代码runtime 路径
    'bootstrap' => ['log'],//@todo
    'aliases' => [//数组的key为别名名称，值为对应的路径
       // '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@bower' => '@vendor/yidas/yii2-bower-asset/bower'

    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'test',//信息： cookieValidationKey 对你的应用安全很重要， 应只被你信任的人知晓，请不要将它放入版本控制中。

        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'maxSourceLines' => 10,

            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,//false发送邮件，true只是生成邮件在runtime文件夹下，不发邮件
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.163.com',  //每种邮箱的host配置不一样
                'username' => 'xifei24@163.com',
                'password' => '005311Xf!!',
                'port' => '25',
                'encryption' => 'tls',
            ],
            'messageConfig'=>[
                'charset'=>'UTF-8',
                'from'=>['xifei24@163.com'=>'admin']
            ],
        ],

        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning','info','trace'],
                ],
                /**
                 * 邮件发送错误日志
                 */
               /**
                [
                    'class' => 'yii\log\EmailTarget',
                    'mailer' => 'mailer',
                    'levels' => ['error'],
                   // 'categories' => ['yii\db\*'],
                    'message' => [
                        'from' => ['xifei24@163.com'],
                        'to' => ['xifei24@163.com'],
                        'subject' => 'Database errors at example.com',
                    ],
                ],
                */

            ],
        ],
        'db' => $db,

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
//                '<controller:[\w-]+>s' => '<controller>/index',
//                '<controller:[\w-]+>/<id:\d+>'=> '<controller>/view',

            ],
        ],

        'search' => function () {
            $solr = new app\components\SolrService('127.0.0.1');
            // ... other initializations ...
            return $solr;
        },
    ],

    'controllerMap' => [//修改路由映射
            'article' => [
                'class' => 'app\controllers\SiteController',
                'enableCsrfValidation' => false,
            ],
        ],
    /**
     * 全网维护
     */
    /**
    'catchAll' => [
            'site/error',

        ],

     */
    'params' => $params,
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
