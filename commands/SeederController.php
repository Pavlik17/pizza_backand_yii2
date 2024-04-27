<?php

namespace app\commands;

use app\seeders\CategoriesSeeder;
use yii\console\Controller;
class SeederController extends Controller{

    private string $path ='/app/seeders/';
    private array $listClassSeeders = [
        'CategoriesSeeder',
        'ProductSeeder',
        'PopularSeeder',
        'StocksSeeder',
  ];

  public function actionExecuteSeederUp($name){
      $seederClass = "\\app\\seeders\\$name";
      try{
          $classObj = new $seederClass;
          $classObj->up();
      }catch (\ErrorException $e){
          print "Error seeder $e";
      };
  }
  public function functionExecuteSeederDown($name){
      $seederClass = "\\app\\seeders\\$name";
      try {
          $classObj = new $seederClass;
          $classObj->down();
      }catch(\ErrorException $e){
          print "Error seeder: $e";
      };
    }
    public function actionExecuteSeedersUp(){
      $seederPath = "\\app\\seeders\\";
      try{
          foreach($this->listClassSeeders as $seederClassItem){
              $activeClass = $seederPath . $seederClassItem;
              $objActive = new $activeClass;
              $objActive->up();
          }
      }catch(\ErrorException $e){
            print "Error seeders: $e";
      }
    }

    public function actionExecuteSeedersDown(){
      $seederClassPath = "\\app\seeders\\";
      try{
          foreach ($this->listClassSeeders as $listClassItem) {
              $seederClassPath = $seederClassPath.$listClassItem;
              $objActive = new $seederClassPath;
              $objActive->down();
          }
      }catch (\ErrorException $e){
          print "Erroe seeders: $e";
      }
    }
}