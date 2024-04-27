<?php
namespace app\seeders;
use Yii;
class StocksSeeder{
    private array $stocks = [
        [
            'image' => '/path',
            'product_id' => 1,
        ],
        [
            'image' => '/path',
            'product_id' => 2,
        ],
        [
            'image' => '/path',
            'product_id' => 3,
        ],
        [
            'image' => '/path',
            'product_id' => 4,
        ],
        [
            'image' => '/path',
            'product_id' => 5,
        ],
        [
            'image' => '/path',
            'product_id' => 6,
        ],
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