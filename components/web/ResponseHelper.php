<?php

namespace app\components\web;

use yii\base\Application;
use yii\base\BootstrapInterface;
use yii\base\Component;
use yii\base\Event;
use yii\web\Response;

class ResponseHelper extends Component implements BootstrapInterface
{
    /**
     * Bootstrap method to be called during application bootstrap stage.
     * @param Application $app the application currently running
     */
    public function bootstrap($app)
    {
        if ($app instanceof \yii\web\Application) {
            $app->response->on(Response::EVENT_BEFORE_SEND, [$this, 'onBeforeSend']);
        }
    }

    /**
     * Response before send handler
     *
     * @param Event $event
     */
    public function onBeforeSend(Event $event)
    {
        $response = $event->sender;
        if ($response->data !== null) {
            $response->data = [
                'success' => $response->isSuccessful,
                'data' => $response->data,
            ];
            $response->statusCode = 200;
        }
    }
}