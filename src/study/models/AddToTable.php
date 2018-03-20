<?php
/**
 * Created by PhpStorm.
 * User: arito
 * Date: 18.03.2018
 * Time: 20:51
 */

namespace app\models;


use yii\base\Model;
use yii\helpers\VarDumper;

class AddToTable extends Model
{
    public $modify_id=null;
    public $is_modified=false;
    public $col_count;
    public $row_count;
    public $col_id;
    public $row_id;
    public $table_id=null;
    public $data=array(array());


    /**
     * AddToTable constructor.
     * @param Table $table
     */
    public function __construct($modify_id=null,$row=null,$col=null)
    {
        parent::__construct();
        if($modify_id!=null) {
            $table=Table::find()->where(['table_id'=>$modify_id])->all();
            foreach ($table as $item) {
                $this->data[$item->col_id][$item->row_id] = $item->data;
                $this->modify_id=$item->table_id;
            }
        }

        else{
            if($row &&$col){
                $this->addSize($row,$col);
            }
        }
    }

    public function rules()
    {
        return [
            ['data','safe'],
            ['row_id','integer']
        ];
    }

    public function addSize($row,$col){
        $this->col_count=$col;
        $this->row_count=$row;
    }
    public function add($modify_id){
        /**
         * @var Table $model
         */
            if ($this->validate()) {
                if($modify_id){
                    $cells=Table::find()->where(['table_id'=>$modify_id])->all();
                    foreach ($cells as $cell){
                        $cell->delete();
                    }
                    $this->table_id=$modify_id;
                }
                else {
                    $model = Table::find()->orderBy(['table_id' => SORT_DESC])->one();
                    $this->table_id = $model->table_id + 1;
                }
                foreach ($this->data as $row_id => $row) {
                    foreach ($row as $column_id => $cell) {
//                    echo 'В ячейке '.$row_id.':'.$column_id.' хранится '.$cell.'<br>';
                        $item = new Table();
                        $item->row_id = $row_id;
                        $item->col_id = $column_id;
                        $item->data = $cell;
                        $item->table_id = $this->table_id;
                        $item->save();
                    }
                }
                return true;
            }
            return false;
    }
}