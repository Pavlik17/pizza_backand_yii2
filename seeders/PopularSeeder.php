<?php
namespace app\seeders;
use Yii;
class PopularSeeder{
    private array $populars = [
    ];

    public function up()
    {
        foreach ($this->populars as $item){
            Yii::$app->db->createCommand()->insert('popular',$item)->execute();
        }
    }
    public function down()
    {
        Yii::$app->db->createCommand()->delete('popular')->execute();
    }
}