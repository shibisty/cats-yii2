<?php

use yii\db\Migration;

/**
 * Class m240718_134700_create_courses
 */
class m240718_134700_create_courses extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('courses', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'thumb' => $this->string(255)->notNull(),
            'price' => $this->decimal(10, 2)->notNull()->defaultValue(0.00),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
            'deleted_at' => $this->timestamp()->null(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('courses');
    }
}
