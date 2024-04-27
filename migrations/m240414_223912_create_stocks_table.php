<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%stocks}}`.
 */
class m240414_223912_create_stocks_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%stocks}}', [
            'id' => $this->primaryKey(),
            'image'=>$this->string()->Null(),
            'product_id'=> $this->integer(10)->notNull(),
            ]);
        $this->addForeignKey(
            'fk_product_stocks',
            'stocks',
            'product_id',
            'product',
            'id',
            'CASCADE',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%stocks}}');
    }
}
