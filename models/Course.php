<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\db\ActiveRecord;

class Course extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'courses';
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

    /**
     * Soft delete the record.
     *
     * @return bool
     */
    public function softDelete()
    {
        $this->deleted_at = new Expression('NOW()');
        return $this->save(false, ['deleted_at']);
    }

    /**
     * Find active records (not soft deleted).
     *
     * @return \yii\db\ActiveQuery
     */
    public static function find()
    {
        return parent::find()->where(['deleted_at' => null]);
    }

    /**
     * Find all records including soft deleted.
     *
     * @return \yii\db\ActiveQuery
     */
    public static function findWithDeleted()
    {
        return parent::find();
    }
}
