<?php

namespace app\models;

use yii\base\Model;
/**
 *@property string $email
 *@property string $password
 *@property string $userName
 *@property string $phone
 */

class RegisterForm extends Model{
    public $email;
    public $password;
    public $userName;
    public $phone;
    public function rules():array
    {
        return [
            [['email','password','userName','phone'],'required'],
            [['email','password','userName','phone'],'string'],
             ['email','match','pattern' => '/^\S+@\S+\.\S+$/'],
             ['phone','match','pattern'=>'/^(\+375|80)(29|25|44|33)(\d{3})(\d{2})(\d{2})$/'],
             ['password', 'string', 'min' => 3, 'max' => 15],
             ['userName', 'string', 'min' => 2]         
            ];
    }   
}