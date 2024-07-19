<?php

namespace app\controllers;

use yii\rest\ActiveController;
use yii\helpers\Json;
use yii\web\Response;

class CourseController extends ActiveController
{
    public $modelClass = 'app\models\Course';

    public function actionIndex()
    {
        return Course::find()->all();
    }
}
