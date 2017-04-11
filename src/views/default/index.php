<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yongtiger\category\Module;

/* @var $this yii\web\View */
/* @var $searchModel yongtiger\category\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Module::t('message', 'Categories');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_item',
    ]) ?>

</div>
