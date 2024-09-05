<?php
namespace app\seeders;
use Yii;
class StocksSeeder{
    private array $stocks = [
    ];

    public function up()
    {
        foreach ($this->stocks as $stock) {
            Yii::$app->db->createCommand()->insert('stocks',$stock)->execute();
        }
    }
    public function down()
    {
        Yii::$app->db->createCommand()->delete('stocks')->execute();
    }
}