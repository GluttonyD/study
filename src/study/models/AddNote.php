<?php
/**
 * Created by PhpStorm.
 * User: arito
 * Date: 21.03.2018
 * Time: 18:11
 */

namespace app\models;


use yii\base\Model;

class AddNote extends Model
{
    private $id;
    public $text;
    public $header;
    public $tags = array();

    public function rules()
    {
        return [
            [['text', 'header'], 'required'],
            [['text', 'header'], 'string'],
            [['tags'], 'allFilled']
        ];
    }

    public function insert()
    {
        if ($this->validate()) {
            if ($this->addNote() && $this->addTag())
                return true;
        }
        return false;
    }

    public function allFilled($attribute, $params)
    {
        foreach ($this->tags as $item) {
            if ($item == null) {
                $this->addError($attribute, 'Все поля должны быть заполнены');
                return false;
            }
        }
        return true;
    }

    public function addTag()
    {
        foreach ($this->tags as $item) {
            $tag = Tags::find()->where(['tag' => $item])->one();
            if (!$tag) {
                $tag = new Tags();
                $tag->tag = $item;
                $tag->save();
            }
            $link = new Link();
            $link->note_id = $this->id;
            $link->tag_id = $tag->id;
            $link->save();
        }
        return true;
    }

    public function createLink()
    {
    }

    public function addNote()
    {
        $note = new Notes();
        $note->text = $this->text;
        $note->header = $this->header;
        $note->save();
        $this->id = $note->id;
        return true;
    }
}