<?php
/**
 * User: xifei
 * Date: 2019/4/23
 * Time: 下午4:23
 */

namespace app\controllers;

use yii\web\Controller;
use app\event\animal\Cat;
use app\event\animal\Mouse;
use app\event\animal\Dog;
use yii\base\Event;

class AnimalController extends Controller
{

    public function actionIndex()
    {

        $cat = new Cat();
        $mouse = new Mouse();
        $dog = new Dog;
        $cat->on('miao',[$mouse,'run']);
        $cat->on('miao',[$dog,'look']);
        $cat->off('miao',[$dog,'look']);
        $cat->shoot();
    }


    public function actionEvent()
    {

        $cat = new Cat();
        $cat1 = new Cat();
        $mouse = new Mouse();
        $dog = new Dog;
        //绑定的类、绑定事件名、handler 操作
        Event::on(Cat::className(),'miao',function($e){
            echo "miao event has trigger</br>".$e->message;
        });
        $cat->shoot();
        $cat1->shoot();


    }
    public function actionAindex()
    {
        \Yii::$app->on(\yii\base\Application::EVENT_AFTER_REQUEST,function(){
            echo "request is finish</br>";

        });

    }
    public function actionDog()
    {
        $dog = new Dog;
        $dog->eat();
    }

}