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
    function function_name1($event) {
        echo $event->data;
    }
    function function_name2($event) {
        echo $event->data;
    }

    public function bar()
    {

        echo "cat is coming</br>";
        $me = new MyEvent;
        $me->message = "hell my event</br>";
        $this->trigger(self::EVENT_HELLO,$me);
    }


}

class MyEvent extends Event
{
    public $message;
}

