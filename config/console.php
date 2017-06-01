<?php

require(__DIR__ . '/environment.php');

$params = require(__DIR__ . '/environments/' . ENVIRONMENT . '/params.php');
$components = require(__DIR__ . '/environments/' . ENVIRONMENT . '/components.php');

$config = [
    'id' => 'service-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'v1'],
    'controllerNamespace' => 'app\commands',
    'enableCoreCommands' => false,
    'modules' => [
        'v1' => [
            'class' => 'app\modules\v1\Module',
        ],
    ],
    'components' => $components,
    'params' => $params,
    'controllerMap' => [
        'help' => 'yii\console\controllers\HelpController',
        'message' => 'yii\console\controllers\MessageController',
        'migrate' => 'yii\console\controllers\MigrateController',
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
