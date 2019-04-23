<?php
/**
 * User: xifei
 * Date: 2019/4/23
 * Time: 下午2:41
 */

namespace app\components;

use yii\base\Component;
use yii\base\Event;

class Mailer extends Component
{
    const EVENT_MESSAGE_SENT = 'messageSent';

    public function send($message)
    {
        // ...发送 $message 的逻辑...

        $event = new MessageEvent;
        $event->message = $message;
        $this->trigger(self::EVENT_MESSAGE_SENT, $event);
    }
}