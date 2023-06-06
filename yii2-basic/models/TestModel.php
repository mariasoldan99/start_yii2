<?php

namespace app\models;

use yii\base\Model;

class TestModel extends Model
{
    public $name;
    public $surname;
    public $email;
    public $myAge;

    public function attributeLabels()
    {
        return [
        'name' => 'Enter your name',
        'age' => 'Your age'
        ];
    }

    public function rules()
    {
        return [
          ['name', 'required', 'message' => "Please enter your name"]
        ];
    }
}