<?php

use yii\db\Migration;
/**
 * Handles the creation of table `{{%categories}}`.
 */
class m240414_214614_create_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%categories}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'show' => $this->booleanllasfneg()->notNull(),
            ]);
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%categories}}');
    }
}
