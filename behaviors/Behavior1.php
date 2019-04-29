<?php
/**
 * User: xifei
 * Date: 2019/4/24
 * Time: 下午4:15
 */
namespace app\behaviors;
use yii\base\Behavior;
class Behavior1 extends Behavior
{
    public $height;
    public function eat()
    {
        echo "dog eat";
    }
}