<?php
/**
 * User: xifei
 * Date: 2019/4/23
 * Time: 下午2:23
 */
namespace app\components;

use yii\base\Component;
use yii\base\Event;

class Foo extends Component
{
    const EVENT_HELLO = 'hello';

    function function_name($event) {
        echo $event->data;
    }

    public function bar()
    {
        $this->trigger(self::EVENT_HELLO);
    }
}
