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
            'id' => 'ID',
            'title' => 'Title',
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
