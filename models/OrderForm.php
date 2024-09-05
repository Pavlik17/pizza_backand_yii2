<?php

// корзина

namespace app\models;

use Yii;
use yii\base\Model;

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
class OrderForm extends Model
{
  public $name;
  public $phone_number;
  public $street;
  public $home;
  public $entrance;
  public $flat;
  public $floor;
  public $totalSum;
  public $payment_method;
  public $method_receiving;
  public $order_products;
    public function rules():array
    {
        return [
            [['name', 'phone_number', 'street', 'home', 'totalSum', 'payment_method', 'method_receiving'],'required'],
            [['totalSum','flat','floor','home','entrance'],'number'],
            ['order_products', 'filter', 'filter' => function ($products) {
                if (!is_array($products)) $this->addError('test', 'Ошибка валидации свойства order_products');

                if (count($products) === 0) $this->addError('test', 'Ваш массив пуст order_products');

                foreach ($products as $product) {
                    if (!is_array($product)) {
                        $this->addError('error_order_products', 'Содержимое колонки order_products не ассоативный массив');
                        continue;
                    }
                    if (!array_key_exists('id', $product)) {
                        $this->addError('test', 'Нету свойства id');
                        continue;
                    }
                    if (!array_key_exists('count', $product)) {
                        $this->addError('test', 'Нету свойства count');
                    }
                }

                return $products;
            }],
            [['name','phone_number','street','payment_method','method_receiving'],'string'],
        ];
    }
}

