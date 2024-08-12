<?php 

namespace app\models;
use yii\base\Model;

class ImageFormProductsMenu extends Model{
    public $imageFile;

    public function rules(){
        return [
            [['imageFile'],'file','skipOnEmpty' => false,'extentions' => 'png,jpg'],
        ];
    }

    public function upload(){
        // добавить фильтрацию на основе категории продукта
    }
};