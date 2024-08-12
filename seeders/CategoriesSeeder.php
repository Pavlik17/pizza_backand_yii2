<?php

namespace app\seeders;

use Yii;

class CategoriesSeeder{
    private array $categories = [
        [
            'name'=>'Пицца',
            'show' =>0,
        ],
        [
            'name'=>'Закуски',
            'show' =>0,
        ],
        [
            'name'=>'Десерты',
            'show' =>0,
        ],
        [
            'name'=>'Напитки',
            'show' =>0,
        ],
        [
            'name'=>'Комбо',
            'show' =>0,
        ],
    ];
    public function up()
    {
        foreach ($this->categories as $category){
            Yii::$app->db->createCommand()->insert('categories',$category)->execute();
        }
    }
    public function down()
    {
        Yii::$app->db->createCommand()->delete('categories')->execute();
    }
};
