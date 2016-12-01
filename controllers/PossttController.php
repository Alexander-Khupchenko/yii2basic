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
        
        //$post = TestForm::findOne();
//        $post->email = '2@2.com';
//        $post->save();
        
        //$post->deleteAll();
        
        
        $model = new TestForm();
//        $model->name = 'Автор';
//        $model->email = 'mail@mail.com';
//        $model->text = 'Текст сообщения';
//        $model->save();    
        
        if($model->load(Yii::$app->request->post()) ) {
            if($model->save()) {
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
//        $query = "SELECT * FROM categories WHERE title LIKE '%ni%'";
//        $cats = Category::findBySql($query)->all();
//        $query = "SELECT * FROM categories WHERE title LIKE :search";
//        $cats = Category::findBySql($query, [':search' => '%ni%'])->all();
        
//        $cats = Category::findOne(5);
//        $cats = Category::find()->with('products')->where('id=5')->all();
        
//        $cats = Category::find()->all(); // отложенная (ленивая) загрузка
        $cats = Category::find()->with('products')->all(); // жадная загрузка

        return $this->render('show', compact('cats'));
    }
}
