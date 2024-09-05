<?php

declare(strict_types=1);

namespace app\controllers;

use yii\rest\Controller;
use app\models\Product;
use app\models\Categories;

//Написать actions CRUD на категории и продукты

final class ProductController extends Controller
{
    public function actionProduct(): array
    {
        $products = Product::find()->asArray()->all();
        return [
            'products' => $products,
        ];
    }
    public function actionCategory(): array
    {
        $categories = Categories::find()->asArray()->all();
        return [
            'categories' => $categories,
        ]; 
    }
};