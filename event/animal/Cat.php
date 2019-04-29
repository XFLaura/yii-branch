<?php
/**
 * User: xifei
 * Date: 2019/4/23
 * Time: 下午4:24
 */
namespace app\event\animal;

use yii\base\Component;
use yii\base\Event;


class MyEvent extends Event
{
    public $message;
}
class Cat extends Component
{
    public function shoot()
    {
        echo "cat is coming</br>";
        $me = new MyEvent;
        $me->message = "hell my event</br>";
        $this->trigger('miao',$me);
    }


}