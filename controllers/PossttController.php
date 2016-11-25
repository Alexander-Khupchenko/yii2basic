<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

/**
 * Description of Posstt
 *
 * @author Sancho
 */
class PossttController extends AppController {
    
    public $layout = 'basic';
    
    public function actionIndex() {
        return $this->render('test');
    }
    
    public function actionShow() {
        //$this->layout = 'basic';
        return $this->render('show');
    }
}
