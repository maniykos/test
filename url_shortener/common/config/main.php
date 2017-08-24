<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [
            'class' => 'yii\web\urlManager',
            'enablePrettyUrl' => true, // для использовать чпу
            'enableStrictParsing' => false,  // в нижний регистр
            'showScriptName' => false, // скрывать index.php
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            //'viewPath' => '@frontend_theme/user/emails',
            'messageConfig' => [
                'charset' => 'UTF-8',
                'from' => ['yii2@site.com' => 'yii2'],
            ],
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'toozzatest@gmail.com',
                'password' => 'test_company',
                'port' => 465,
                'encryption' => 'ssl',
            ],
        ],
    ],
];
