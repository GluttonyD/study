<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "table".
 *
 * @property int $id
 * @property int $col_id
 * @property int $row_id
 * @property string $data
 * @property int $table_id
 */
class Table extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'table';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['col_id', 'row_id', 'table_id'], 'integer'],
            [['data'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'col_id' => 'Col ID',
            'row_id' => 'Row ID',
            'data' => 'Data',
            'table_id' => 'Table ID',
        ];
    }
}
