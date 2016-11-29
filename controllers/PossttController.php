<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;
use Yii;
use app\models\TestForm;
use app\models\Category;

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
            debbug(Yii::$app->request->post());
            return 'test';
        }
        
        $model = new TestForm();
        if($model->load(Yii::$app->request->post()) ) {
            if($model->validate()) {
                Yii::$app->session->setFlash('success', 'Данные приняты');
                return $this->refresh();
            }else {
                Yii::$app->session->setFlash('error', 'Ошибка');
            }
        }
        
        $this->view->title = 'Все статьи';
        return $this->render('test', compact('model'));
    }
    
    public function actionShow() {
        $this->view->title = 'Одна статья!!!';
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => 'ключевики...']);
        $this->view->registerMetaTag(['name' => 'description', 'content' => 'описание страницы...']);
        
//        $cats = Category::find()->all();
//        $cats = Category::find()->orderBy(['id' => SORT_DESC])->all();
//        $cats = Category::find()->asArray()->all();
//        $cats = Category::find()->asArray()->where('parent=1')->all(); 
//        $cats = Category::find()->asArray()->where(['parent' => 2])->all(); 
//        $cats = Category::find()->asArray()->where(['like', 'title', 'ni'])->all(); 
//        $cats = Category::find()->asArray()->where(['<=', 'id', 3])->all(); 
//        $cats = Category::find()->asArray()->where('parent=1')->limit(1)->one(); 
//        $cats = Category::find()->asArray()->where('parent=1')->count(); 
//        $cats = Category::findOne(['parent' => 2]); 
//        $cats = Category::findAll(['parent' => 2]); 
        $query = "SELECT * FROM categories WHERE title LIKE '%ni%'";
        $cats = Category::findBySql($query)->all();

        return $this->render('show', compact('cats'));
    }
}
