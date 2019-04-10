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


/* @var $this yii\web\View */
/* @var $searchModel app\models\CountrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Countries';
$this->params['breadcrumbs'][] = $this->title;
?>


<?php
header('X-XSS-Protection: 0');
$searchQuery = $_GET['q'];
/* some search magic here */
?>
<!--<h1>You searched for: --><?php //echo $searchQuery; ?><!--</h1>-->

<!--header('X-XSS-Protection: 0');情况下-->
<!--<h1>You searched for after sercurity: --><?php //echo htmlentities($searchQuery, ENT_QUOTES) ?><!--</h1>-->

<a href="<?php $searchQuery?>">Visit Users homepage</a>

<?php echo $searchQuery?>

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
