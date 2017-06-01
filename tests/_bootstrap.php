<?php
define('YII_ENV', 'test');
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('ENVIRONMENT') or define('ENVIRONMENT', 'test');

require_once(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');
require __DIR__ .'/../vendor/autoload.php';

Yii::setAlias('@tests', __DIR__);

(new \yii\web\Application(require(__DIR__ . '/../config/test.php')));