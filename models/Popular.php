<?php

namespace app\models;

use yii\db\ActiveRecord;

class Popular extends ActiveRecord{
    public static function tableName(){
        return 'popular';
    }
};