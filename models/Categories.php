<?php

declare(strict_types=1);

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use app\models\Product;

class Categories extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'categories';
    }
    public function getProducts(): ActiveQuery
    {
        return $this->hasMany(Product::class, ['category_id' => 'id']);
    }
}
