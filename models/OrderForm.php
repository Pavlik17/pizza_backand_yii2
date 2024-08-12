<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 *@property int $id
 *@property int $product_id
 * @property string $name
 * @property string $phone
 * @property string $street
 * @property string $house
 * @property string $entrance
 * @property string $flat
 * @property string $floor
 * @property string $totalSum
 * @property string $paymentMethod
 * @property string $methodReceiving
 */
class Order extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%orders}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id'],'integer'],
            [['totalSum'],'number'],
            [['name','phone','street','house','entrance','flat','floor','totalSum','paymentMethod','methodReceiving'],'string'],
        ];
    }
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['product_id' => 'id']);
    }
    /**
     * {@inheritdoc}
     */

}

