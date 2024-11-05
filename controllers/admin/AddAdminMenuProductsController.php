<?php 
// проверить работает ли валидация, исправить данный контроллер(yii2 по загрузка файлов)

namespace app\controllers\admin;

use app\models\Forms\ProductFormMenuAdmin;
use app\models\Product;
use yii\base\Controller;
use yii\web\UploadedFile;
use Yii;

class AddAdminMenuProductsController extends Controller{
    public function actionUpload(){
        $upload = new ProductFormMenuAdmin();
        $upload->load(Yii::$app->request->post(),'');
       
        if(Yii::$app->request->isPost){
            $upload->file = UploadedFile::getInstance($upload,'file');
            if($upload->upload()){
                return 'валидация прошла';
            }
            else{
                return 'валидация не прошла';
            }
        }

        if(Yii::$app->request->isPost){
            $file =  $_FILES['file'];
            $upload->file = new UploadedFile( [
                'name' => $file['name'],
                'tempName' => $file['tmp_name'],
                'type' => $file['type'],
                'size' => $file['size'],
                'error' => $file['error'],
                ]);
                
            $upload->upload();
    
        }
        // print('<pre>');
        // print_r(in_array($upload->file->extension,['jpg', 'png', 'jpeg']));
        // exit();
        
        
       
        

        // $idTypeImage = $uploads->idCategory;
        // foreach($uploads as $file){
        //     if($file instanceof UploadedFile){
        //         if(in_array($file->extension,['jpg', 'png', 'jpeg'])){
        //             if($idTypeImage == 1){
        //                 if($file->saveAs('PizzaImages/'.$file->name)){
        //                     $pizza = new Product();
        //                     $pizza->image = '/PizzaImages'.$file->name;
        //                     $pizza->title = $file->name;
        //                     $pizza->description;
        //                     $pizza->price;
        //                     $pizza->save();
        //                     Yii::$app->response->statusCode = 201;
        //                     return $file->name;
        //                 }
        //             }
        //             else if($idTypeImage == 2){
        //                 if($file->saveAs('SnacksImages/'.$file->name)){
        //                     $pizza = new Product();
        //                     $pizza->image = '/SnacksImages'.$file->name;
        //                     $pizza->save();
        //                     Yii::$app->response->statusCode = 201;
        //                     return $file->name;
        //                 }
        //             }
        //             else if($idTypeImage == 3){
        //                 if($file->saveAs('DessertsImages/'.$file->name)){
        //                     $pizza = new Product();
        //                     $pizza->image = '/DessertsImages'.$file->name;
        //                     $pizza->save();
        //                     Yii::$app->response->statusCode = 201;
        //                     return $file->name;
        //                 }
        //             }
        //             else if($idTypeImage == 4){
        //                 if($file->saveAs('DranksImages/'.$file->name)){
        //                     $pizza = new Product();
        //                     $pizza->image = '/DranksImages'.$file->name;
        //                     $pizza->save();
        //                     Yii::$app->response->statusCode = 201;
        //                     return $file->name;
        //                 }
        //             }
        //             else if($idTypeImage == 5){
        //                 if($file->saveAs('ComboImages/'.$file->name)){
        //                     $pizza = new Product();
        //                     $pizza->image = '/ComboImages'.$file->name;
        //                     $pizza->save();
        //                     Yii::$app->response->statusCode = 201;
        //                     return $file->name;
        //                 }
        //             }
        //             else{
        //                 return 'Данный продукт не существует!!!';
        //             }
        //         }
        //     }
        //     Yii::$app->response->statusCode = 400;
        //     return 'Ошибка загрузки файла!!!!';
        // }
    }
}; 