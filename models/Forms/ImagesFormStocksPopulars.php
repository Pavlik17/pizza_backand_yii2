<?php 

// админ панель 

namespace app\models;

use Yii;
use yii\base\Model;

class ImagesFormStocksPopulars extends Model{
    
    public $fileImage;
    public $idType;
    public function rules()
    {
        return[
            [['idType'],'number'],
            [['fileImage'],'file','skipOnEmpty' => false,'extentions' => 'png,jpg'],
        ];
    }
};