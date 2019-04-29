<?php
/**
 * User: xifei
 * Date: 2019/4/23
 * Time: 下午4:25
 */
namespace app\event\animal;

use yii\base\Component;

class Mouse extends Component
{
    public function run($e)
    {
        echo $e->message;

        echo "Mouse is running</br>";
    }

}