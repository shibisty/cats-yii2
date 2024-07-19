<?php

namespace app\controllers;

use yii\rest\ActiveController;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

class CatController extends ActiveController
{
    public $modelClass = 'app\models\Cat';

    public function behaviors()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;

        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'add' => ['post'],
                ],
            ],
        ];
    }

    public function actionList()
    {
        return $this->modelClass::find()->with('courses')->asArray()->all();
    }

    public function actionAdd()
    {
        $model = new $this->modelClass;
        $params = (array)json_decode(\Yii::$app->request->getRawBody());

        $model->load($params, '');

        if ($model->save()) {
            $courseIds = ArrayHelper::getValue($params, 'courseIds', []);

            $model->saveCatCourses($model->id, $courseIds);
  
            return $this->modelClass::find()->with('courses')->where(['id' => $model->id])->asArray()->one();
        } else {
            \Yii::$app->response->statusCode = 422;
            return $model->errors;
        }
    }
}
