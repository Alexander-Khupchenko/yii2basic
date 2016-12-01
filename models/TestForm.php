<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;
use yii\db\ActiveRecord;

/**
 * Description of TestForm
 *
 * @author Sancho
 */
class TestForm extends ActiveRecord {
    
    public static function tableName() {
        return 'posts';
    }

    public function attributeLabels() {
        return [
            'name' => 'Имя',
            'email' => 'E-mail',
            'text' => 'Текст сообщения',
        ];
    }
    
    public function rules() {
        return [
            [['name', 'text'], 'required'],
            ['email', 'email'],
        ];
    }
}
