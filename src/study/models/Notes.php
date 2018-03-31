<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "notes".
 *
 * @property int $id
 * @property string $header
 * @property string $text
 *
 * @property Tags[] $tags
 * @property Tags[] $bigTags
 */
class Notes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'notes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['header', 'text'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'header' => 'Header',
            'text' => 'Text',
        ];
    }

    public function getTags(){
            return $this->hasMany(Tags::className(),['id'=>'tag_id'])
                ->viaTable('link',['note_id'=>'id']);
    }

    public function getBigTags(){
        return $this->hasMany(Tags::className(),['id'=>'tag_id'])->where(['>','id',3])->viaTable('link',['note_id'=>'id']);
    }


}
