<?php

use yii\helpers\Html;
use yongtiger\category\Module;

/* @var $this yii\web\View */
/* @var $model yongtiger\category\models\Category */

$this->title = Module::t('message', 'Create Category');
$this->params['breadcrumbs'][] = ['label' => Module::t('message', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
