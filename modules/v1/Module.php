<?php

namespace app\modules\v1;

use yii\base\Application;
use yii\base\BootstrapInterface;

/**
 * v1 module definition class
 */
class Module extends \yii\base\Module implements BootstrapInterface
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\v1\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    /**
     * Bootstrap method to be called during application bootstrap stage.
     * @param Application $app the application currently running
     */
    public function bootstrap($app)
    {
        if ($app instanceof \yii\web\Application) {
            $app->urlManager->addRules(require(__DIR__ . '/config/url-rules.php'));
        }
    }
}
