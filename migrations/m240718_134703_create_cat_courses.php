<?php

use yii\db\Migration;

/**
 * Class m240718_134703_create_cat_courses
 */
class m240718_134703_create_cat_courses extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('cat_courses', [
            'id' => $this->primaryKey(),
            'course_id' => $this->integer()->notNull(),
            'cat_id' => $this->integer()->notNull(),
        ]);

        $this->createIndex(
            'index_course_id',
            'cat_courses',
            'course_id'
        );

        $this->addForeignKey(
            'forign_course_id',
            'cat_courses',
            'course_id',
            'courses',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'index_cat_id',
            'cat_courses',
            'cat_id'
        );

        $this->addForeignKey(
            'forign_cat_id',
            'cat_courses',
            'cat_id',
            'cats',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'index_course_id',
            'cat_courses'
        );

        $this->dropIndex(
            'forign_course_id',
            'cat_courses'
        );

        $this->dropForeignKey(
            'index_cat_id',
            'cat_courses'
        );

        $this->dropIndex(
            'forign_cat_id',
            'cat_courses'
        );

        $this->dropTable('cat_courses');
    }
}
