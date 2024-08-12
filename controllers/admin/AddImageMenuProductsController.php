<?php 

namespace app\controllers\admin;

use app\models\ImageFormProductsMenu;
use yii\base\Controller;

class AddImageMenuProductsController extends Controller{
    public function actionAddImage(){
        $model  = new ImageFormProductsMenu();
    }
}; 