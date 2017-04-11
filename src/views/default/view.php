<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yongtiger\category\Module;

/* @var $this yii\web\View */
/* @var $model yongtiger\category\models\Category */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Module::t('message', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
        ],
    ]) ?>

</div>
