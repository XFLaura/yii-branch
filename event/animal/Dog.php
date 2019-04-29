<?php
/**
 * User: xifei
 * Date: 2019/4/23
 * Time: 下午5:40
 */

namespace app\event\animal;

use app\behaviors\Behavior1;
use yii\base\Component;

class Dog extends Component
{
    public function behaviors()
    {
        return [Behavior1::className()];
    }
    public function look()
    {
        echo "dog is looking<br>";
    }

}