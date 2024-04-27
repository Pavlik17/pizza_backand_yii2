<?php

declare(strict_types=1);

namespace app\models;

use yii\db\ActiveRecord;

final class Product extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'product';
    }
}