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
use yii\db\ActiveRecord;
use yongtiger\category\Module;

/**
 * This is the model class for table "{{%category}}".
 *
 * @property int $id
 * @property string $title
 */
class Category extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return Module::instance()->tableName;
    }

    ///[v0.0.3 (ADD# creocoder\nestedsets)]
    public function behaviors() {
        return [
            'tree' => [
                'class' => \creocoder\nestedsets\NestedSetsBehavior::className(),
                // 'treeAttribute' => 'tree',
                // 'leftAttribute' => 'lft',
                // 'rightAttribute' => 'rgt',
                // 'depthAttribute' => 'depth',
            ],
        ];
    }
    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }
    ///[http:www.brainbook.cc]

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Module::t('message', 'ID'),
            'title' => Module::t('message', 'Title'),
        ];
    }

    /**
     * @inheritdoc
     * @return CategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        ///[v0.0.2 (CHG# Module config:model classes)]
        return Yii::createObject(Module::instance()->categoryQueryClass, [get_called_class()]);
    }
}
