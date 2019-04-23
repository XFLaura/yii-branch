<?php
/**
 * User: xifei
 * Date: 2019/4/16
 * Time: 上午10:13
 */
namespace app\components;
use yii\base\BaseObject;

class MyClass extends BaseObject
{
    public $prob1;
    public $prob2;

    /**
     * 构造方法内的预初始化过程。
     * 可以在这儿给各属性设置缺省值。
     * 通过 $config 配置对象。
     * 配置的过程可能会覆盖掉先前在构造方法内设置的默认值。
     * MyClass constructor.
     * @param $param1
     * @param $param2
     * @param array $config
     *
     */
    public function __construct($param1,$param2,$config=[])
    {
        //配置参数
        parent::__construct($config);
    }

    /**
     * 在 init() 方法内进行初始化后的收尾工作。
     * 可以通过重写此方法，进行一些良品检验，属性的初始化之类的工作。
     */
    public function init()
    {

        parent::init();
        // ... 应用配置后进行初始化
    }


}

