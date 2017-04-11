<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yongtiger\category\Module;

/* @var $this yii\web\View */
/* @var $model yongtiger\category\models\CategorySearch */
/* @var $form yii\widgets\ActiveForm */

?>
<div class="category-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <div class="form-group">
        <?= Html::submitButton(Module::t('message', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Module::t('message', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
