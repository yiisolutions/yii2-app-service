<?php

use yii\helpers\ArrayHelper;
use yii\web\Response;

require(__DIR__ . '/environment.php');

$params = require(__DIR__ . '/environments/' . ENVIRONMENT . '/params.php');
$components = require(__DIR__ . '/environments/' . ENVIRONMENT . '/components.php');

return [
    'id' => 'service',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [
        'log',
        'v1',
        [
            'class' => 'yii\filters\ContentNegotiator',
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
                'application/xml' => Response::FORMAT_XML,
            ],
            'languages' => [
                'en',
            ],
        ],
        [
            'class' => 'app\components\web\ResponseHelper',
        ],
    ],
    'modules' => [
        'v1' => [
            'class' => 'app\modules\v1\Module',
        ],
    ],
    'components' => ArrayHelper::merge([
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'z2tv2YNB1ZaoQhgWsQstRdoMtxwxxjlz',
        ],
        'user' => [
            'enableSession' => false,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => require(__DIR__ . '/url-rules.php'),
        ],
    ], $components),
    'params' => $params,
];
