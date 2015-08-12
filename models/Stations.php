<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stations".
 *
 * @property integer $id
 * @property integer $line_id
 * @property string $name
 * @property string $description
 * @property string $image
 * @property integer $record_status
 *
 * @property Lines $line
 */
class Stations extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'line_id'], 'required'],
            [['id', 'line_id', 'record_status'], 'integer'],
            [['description'], 'string'],
            [['name', 'image'], 'string', 'max' => 255],
            ['file', 'file']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'line_id' => 'Line',
            'name' => 'Station Name',
            'description' => 'Description',
            'image' => 'Image',
            'file' => 'Image',
            'record_status' => 'Record Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLine()
    {
        return $this->hasOne(Lines::className(), ['id' => 'line_id']);
    }
}
