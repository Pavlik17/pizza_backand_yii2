<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m240414_223725_create_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'image' => $this->text(600)->Null(),
            'title' => $this->string(90)->notNull(),
            'description'=>$this->text(600)->notNull(),
            'price'=> $this->decimal()->notNull(),
            'category_id' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey(
            'fk_product-category',
            'product',
            'category_id',
            'categories',
            'id',
            'CASCADE',
    );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product}}');
    }
}
