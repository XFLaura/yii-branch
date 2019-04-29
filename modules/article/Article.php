<?php

namespace app\modules\article;

/**
 * article module definition class
 */
class Article extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\article\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        // custom initialization code goes here
        $this->modules =[
            'category' => [
                'class' => 'app\modules\article\modules\category\Category',
            ]
        ];
    }
}
