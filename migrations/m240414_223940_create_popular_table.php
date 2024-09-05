<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%popular}}`.
 */
class m240414_223940_create_popular_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%popular}}', [
            'id' => $this->primaryKey(),
            'image'=> $this->string(120)->Null(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%popular}}');
    }
}