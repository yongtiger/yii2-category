<?php ///[Yii2 category]

/**
 * Yii2 category
 *
 * @link        http://www.brainbook.cc
 * @see         https://github.com/yongtiger/yii2-category
 * @author      Tiger Yong <tigeryang.brainbook@outlook.com>
 * @copyright   Copyright (c) 2017 BrainBook.CC
 * @license     http://opensource.org/licenses/MIT
 */

namespace yongtiger\category\models;

use Yii;
use yongtiger\category\Module;
use yongtiger\tree\models\Tree;

/**
 * This is the model class for table "{{%category}}".
 *
 * @property int $id
 * @property string $name
 */
class Category extends Tree
{
    // use \yongtiger\tree\traits\TreeTrait;    ///you can use `\yongtiger\tree\models\TreeTrait` instead of extending from `\yongtiger\tree\models\Tree`

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return Module::instance()->tableName;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Module::t('message', 'ID'),
            'name' => Module::t('message', 'Name'),
        ];
    }
}
