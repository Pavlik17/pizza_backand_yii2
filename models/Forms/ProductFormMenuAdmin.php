<?php 

namespace app\models\Forms;
use yii\base\Model;
use yii\web\UploadedFile;


class ProductFormMenuAdmin extends Model{

    public $title;
    public $file;
    public $description;
    public $price;
    public $idCategory;
    
    public function rules()
    {
        return [
          [['title','description','price','idCategory'],'required'],
        //   [['file'],'file','skipOnEmpty' => false, 'extensions' => 'png,jpg,jpeg'],
          [['title'],'string', 'max' => 15],
          [['description'],'string','max' => 200],
          [['price'],'string','max' => 4 ],
          [['idCategory'],'string','max' => 1],
        ];
    } 

    public function upload(){
        if($this->validate()){
            //  $this->file->saveAs(__DIR__.'/../../web/MenuProductsImages/PizzaImages/'. $this->file->baseName. '.'. $this->file->extension);
            return true;
        }
        return false;
    }
}