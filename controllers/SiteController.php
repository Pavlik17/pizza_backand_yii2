<?php

declare(strict_types=1);

namespace app\controllers;

use yii\web\Controller;
use app\models\Product;

class SiteController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
