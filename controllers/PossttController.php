<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

use Yii;

/**
 * Description of Posstt
 *
 * @author Sancho
 */
class PossttController extends AppController {
    
    public $layout = 'basic';
    
    public function beforeAction($action) {
        if($action->id == 'index') {
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }
    
    public function actionIndex() {
        if( Yii::$app->request->isAjax ) {
            //debbug($_POST);
            debbug(Yii::$app->request->post());
            return 'test';
        }
        return $this->render('test');
    }
    
    public function actionShow() {
        //$this->layout = 'basic';
        $this->view->title = 'Одна статья!!!';
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => 'ключевики...']);
        $this->view->registerMetaTag(['name' => 'description', 'content' => 'описание страницы...']);
        return $this->render('show');
    }
}
