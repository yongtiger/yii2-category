<?php

use yii\helpers\Html;
use yongtiger\category\Module;

/* @var $this yii\web\View */
/* @var $model yongtiger\category\models\Category */

$this->title = Module::t('message', 'Update Category: ') . $model->title;
$this->params['breadcrumbs'][] = ['label' => Module::t('message', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Module::t('message', 'Update');

?>
<div class="category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
