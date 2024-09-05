<?php

namespace app\controllers\admin;

use app\models\Stocks;
use app\models\Popular;
use Yii;
use yii\rest\Controller;
use yii\web\UploadedFile;

class AddImageStocksPopularsController extends Controller{
    public function actionUpload(){
       $uploads = UploadedFile::getInstancesByName("imageFile");
       $idTypeImage = Yii::$app->request->post('idType'); 
       if(empty($uploads)){
            Yii::$app->response->statusCode = 400;
            return 'Отсутствуют загруженные файлы!!!';
       }
       foreach($uploads as $file){
            if($file instanceof UploadedFile){
                if(in_array($file->extension,['jpg', 'png', 'jpeg'])){
                    if($idTypeImage == 1){
                        if($file->saveAs('StocksProductsImages/'.$file->name)){
                            $stocks = new Stocks();
                            $stocks->image = '/StocksProductsImages/'.$file->name;
                            $stocks->save();
                            Yii::$app->response->statusCode = 201;
                            return $file->name;
                        }
                    }else if($idTypeImage == 2){
                        if($file->saveAs('PopularsProductsImages/'.$file->name)){
                            $popular = new Popular();
                            $popular->image = '/PopularsProductsImages/'.$file->name;
                            $popular->save();
                            Yii::$app->response->statusCode = 201;
                            return $file->name;
                        } 
                    }else{
                        return 'Данный продукт не существует!!';
                    }
                }
            }
        }

        Yii::$app->response->statusCode = 400;
        return 'Ошибка загрузки фала!!!';
    }
};