<?php

declare(strict_types=1);

namespace app\controllers;

use app\models\OrderForm;
use Yii;
use yii\rest\Controller;

final class BasketController extends Controller
{
    public function actionSendOrder(): array {
        $model = new OrderForm();
        if($model->load(Yii::$app->request->post(), '') && $model->validate()) {
            //тут выполняю запись
            echo "Данные записаны успешно.";
        }
        else{
           return $model->getErrors();
        }
        return [ "send" => false, "error" => true];
    }
}