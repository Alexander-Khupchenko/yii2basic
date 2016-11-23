<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

/**
 * Description of PostController
 *
 * @author User
 */
class PostController extends AppController {
    
    public function actionIndex($name = 'Гость') {
        $hello = "Привет, мир!";
        $hi = "Privet!!!";
        
        return $this->render('index', compact('hello', 'hi', 'name'));
    }
    
    public function actionTest() {
        return $this->render('test');
    }
}
