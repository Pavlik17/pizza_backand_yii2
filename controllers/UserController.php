<?php

namespace app\controllers;

use app\controllers\ConfigController;

class UserController extends ConfigController{
    public function actionHello(){
        echo "Hello";
    }
    
};