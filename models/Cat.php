<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\db\ActiveRecord;

class Cat extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cats';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['first_name', 'last_name'], 'string', 'max' => 255],
            [['age'], 'string', 'max' => 60],
            [['phone'], 'string', 'max' => 16],
            [['total'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'age' => 'Age',
            'phone' => 'Phone',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'total' => 'Total',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    public function getCourses()
    {
        return $this->hasMany(Course::class, ['id' => 'course_id'])
                    ->viaTable('cat_courses', ['cat_id' => 'id']);
    }

    public function saveCatCourses($catId, $courseIds)
    {
        \Yii::$app->db->createCommand()
            ->delete('cat_courses', ['cat_id' => $catId])
            ->execute();

        foreach ($courseIds as $courseId) {
            $courseExists = Course::findOne($courseId);

            if ($courseExists) {
                \Yii::$app->db->createCommand()
                    ->insert('cat_courses', [
                        'cat_id' => $catId,
                        'course_id' => $courseId,
                    ])
                    ->execute();
            }
            
        }
    }
}
