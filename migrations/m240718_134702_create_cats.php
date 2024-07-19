<?php

use yii\db\Migration;

/**
 * Class m240718_134702_create_cats
 */
class m240718_134702_create_cats extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('cats', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string(255)->notNull(),
            'last_name' => $this->string(255)->notNull(),
            'age' => $this->string(60)->notNull(),
            'phone' => $this->string(16)->notNull(),
            'total' => $this->decimal(10, 2)->notNull()->defaultValue(0.00),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('cats');
    }
}
