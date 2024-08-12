<?php 

namespace app\models;

use yii\base\Model;

class ImagesFormStocksPopulars extends Model{
    
    public $imageFile;
    public function rules()
    {
        return[
            [['imageFile'],'file','skipOnEmpty' => false,'extentions' => 'png,jpg'],
        ];
    }
    
    public function upload(){
        //добавить фильтр на основе idType чтобы раскидывать в популярные либо акционные
        if($this->validate()){
            $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        }else{
            return false;
        }
    }
};