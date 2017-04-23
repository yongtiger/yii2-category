<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yongtiger\category\Module;

/* @var $this yii\web\View */
/* @var $items array tree of yongtiger\category\models\Category */

$this->title = Module::t('message', 'Categories');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="category-index">

    <?= \yongtiger\tree\widgets\TreeView::widget([
        'nodes' => $items,
        // 'nodeActions' => [          ///optional
        //     'view' => [
        //         'actionText' => '<span class="glyphicon glyphicon-eye-open"></span>',
        //         'actionOptions' => [
        //             'class' => 'btn btn-xs btn-default',
        //         ],
        //     ],
        //     'update' => [
        //         'actionText' => '<span class="glyphicon glyphicon-pencil"></span>',
        //         'actionOptions' => [
        //             'class' => 'btn btn-xs btn-primary',
        //         ],
        //     ],
        //     'create' => [
        //         'actionText' => '<span class="glyphicon glyphicon-plus"></span>',
        //         'actionOptions' => [
        //             'class' => 'btn btn-xs btn-success',
        //         ],
        //     ],
        //     'delete' => [
        //         'actionText' => '<span class="glyphicon glyphicon-trash"></span>',
        //         'actionOptions' => [
        //             'class' => 'btn btn-xs btn-danger',
        //             'data-confirm' => Module::t('message', 'Are you sure you want to delete this item?'),
        //             'data-method' => 'post',
        //             ///for ajax
        //             // 'href' => 'javascript:void(0)', ///Note: It will override the 'href' of `nodeActionOptions`
        //             // 'data-url' => '{action-url}',   ///it will be replaced with the URL created using [[createUrl()]]
        //         ],
        //     ],
        //     'delete-all' => [
        //         'actionText' => '<span class="glyphicon glyphicon-trash"></span>',
        //         'actionOptions' => [
        //             'class' => 'btn btn-xs btn-danger',
        //             'data-confirm' => 'Are you sure you want to delete this item and its children?', ///???i18n
        //             'data-method' => 'post',
        //             ///for ajax
        //             // 'href' => 'javascript:void(0)', ///Note: It will override the 'href' of `nodeActionOptions`
        //             // 'data-action-url' => '{action-url}',   ///it will be replaced with the URL created using [[createUrl()]]
        //         ],
        //     ],
        //     // more ...
        // ],

    ]); ?>

</div>
