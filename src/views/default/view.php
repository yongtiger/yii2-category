<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yongtiger\category\Module;

/* @var $this yii\web\View */
/* @var $model yongtiger\category\models\Category */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Module::t('message', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="category-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Module::t('message', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Module::t('message', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Module::t('message', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
        ],
    ]) ?>

</div>
