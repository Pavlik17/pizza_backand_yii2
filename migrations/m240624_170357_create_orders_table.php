<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%orders}}`.
 */
class m240624_170357_create_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     * @throws \yii\base\Exception
     */
    public function safeUp()
    {
        $this->createTable('{{%orders}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'phone' => $this->string()->notNull(),
            'street' => $this->string()->notNull(),
            'house' => $this->string()->notNull(),
            'entrance' => $this->integer()->notNull(),
            'flat' => $this->string(),
            'floor' => $this->string(),
            'totalSum' => $this->decimal()->notNull(),
            'paymentMethod' => $this->string()->notNull(),
            'methodReceiving' => $this->string()->notNull(),
           // 'order_product' => $this->json()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%orders}}');
    }
}
