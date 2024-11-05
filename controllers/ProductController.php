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
    public function actionPizzaProducts():array{
        $pizzaProducts = Product::find()->where(['category_id' => 1])->all();
        return ['pizzas_info' => $pizzaProducts];
    }
    public function actionDessertsProducts():array{
        $dessertsProducts = Product::find()->where(['category_id' => 3])->all();
        return [ 'desserts_info' => $dessertsProducts];
    }
    public function actionSnacksProducts():array{
        $snacksProducts = Product::find()->where(['category_id'=> 2])->all();
        return ['snacks_info' => $snacksProducts];
    }
    public function actionDrancksProducts():array{
        $dranksProducts = Product::find()->where(['category_id' => 4])->all();
        return ['dranks_info' => $dranksProducts];
    } 
    public function actionComboProducts():array{
        $comboProducts = Product::find()->where(['category_id' => 5])->all();
        return ['combo_info' => $comboProducts];
    }
};