<?php 

namespace app\models;

use yii\db\ActiveRecord;

class Stocks extends ActiveRecord{
    
    public static function tableName(){
        return 'stocks';
    }
}

