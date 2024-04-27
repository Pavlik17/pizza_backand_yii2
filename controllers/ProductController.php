<?php

declare(strict_types=1);

namespace app\controllers;

use yii\web\Controller;
use app\models\Product;
use app\models\Categories;

//Написать actions CRUD на категории и продукты

final class ProductController extends Controller
{
    public function actionProduct(): string
    {
        $products = Product::find()->all();

        return $this->render('/product/index', compact('products'));
    }

    public function actionCategory()
    {
        $categories = Categories::find()->where(['id' => 2])->asArray()->all();

        print '<pre>';
        print_r($categories);
        die();
    }
}