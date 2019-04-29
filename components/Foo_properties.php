<?php
/**
 * User: xifei
 * Date: 2019/4/17
 * Time: 上午9:56
 */
namespace app\components;

use yii\base\Component;

class Foo extends BaseObject
{

    /**
     * @var
     * 如果此类属性名和类成员变量相同，以后者为准。
     * 假设以上 Foo 类有个 label 成员变量，
     * 然后给 $object->label = 'abc' 赋值，
     * 将赋给成员变量而不是 setter setLabel() 方法
     * 属性$_label 私有，对外不可用，使用set 方法对外
     *
     */
    private $_label;
    //public $label;

    public function getLabel()
    {
        return $this->_label;
    }

    /**
     * 这类属性的 getter 和 setter 方法只能定义为非静态的，
     * 若定义为静态方法（static）则不会以相同方式处理
     * 静态方法，不能通过对象调用
     * @param $value
     */
    public function setLabel($value)
    {
        \Yii::trace("setLabelinFoo1".$value);
        //$this->_label= 'test';
        \Yii::trace("setLabelinFoo2".$value);

        $this->_label = trim($value);
        \Yii::trace("setLabelinFoo3".$value);

    }
}
