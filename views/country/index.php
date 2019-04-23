<?php
/**
 * User: xifei
 * Date: 2019/3/30
 * Time: 下午11:18
 */
use yii\helpers\Html;
use yii\grid\GridView;
use app\components\HelloWidget;
use yii\helpers\Url;
use yii\bootstrap\Alert;


/* @var $this yii\web\View */
/* @var $searchModel app\models\CountrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Countries';
$this->params['breadcrumbs'][] = $this->title;
?>


<?=  Alert::widget([
'options' => ['class' => 'alert-info'],
'body' => $session_body,
]);
?>

<?= HelloWidget::widget(['message' => 'Good morning']) ?>
<div class="country-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Country', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'code',
            'name',
            'population',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?=
    $url = Url::to(['post/view', 'id' => 100]);

    ?>




</div>
