<?php 

//Админ панель

namespace app\models;
use yii\base\Model;

class ImageFormProductsMenu extends Model{
    public $imageFile;
    public $categoryId;
    
    public function rules(){
        return [
            [['imageFile'],'file','skipOnEmpty' => false,'extentions' => 'png,jpg'],
            [['categoryId'],'integer'],
        ];
    }

    // public function upload(){
    //     // добавить фильтрацию на основе категории продукта
    // }
};