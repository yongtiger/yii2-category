<?php

use yii\helpers\Html;

/**
 * @var $model yongtiger\category\models\Category
 * @var $key mixed
 * @var $index integer
 * @var $widget yii\widgets\ListView
 * @var $this yii\web\View
 */

?>
<div data-id="<?= $key ?>" class="well">
    <?= Html::a($model->name, ['/category/default/view', 'id' => $model->id]) ?>
</div>
