<?php 

namespace app\models;

use app\models\RegisterForm;
use yii\base\Model;

class AuthForm extends Model{
     public $email;
     public $password;

     public function rules():array{
        return [
            [['email','password'],'required'],
            [['email','password'],'string'],
            ['email','match','pattern' => "/^\S+@\S+\.\S+$/"],
            ['password', 'string', 'min' => 3, 'max' => 15],
        ];
        
    }
};