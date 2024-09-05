<?php 

namespace app\controllers\admin;

use app\models\ImageFormProductsMenu;
use yii\base\Controller;
use Yii;

class AddImageMenuProductsController extends Controller{
    public function actionAddImage(){
        $model  = new ImageFormProductsMenu();
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            Yii::$app->response->statusCode = 201;
        }else{
            Yii::$app->response->statusCode = 400;
        };
    }
}; 