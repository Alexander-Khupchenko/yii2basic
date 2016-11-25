<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;
use app\models\Post;
use yii\data\Pagination;

/**
 * Description of PostController
 *
 * @author User
 */
class PostController extends AppController {
    
    public function actionIndex($name = 'Гость') {
        
        $query = Post::find()->select('id, title, excerpt')->orderBy('id DESC');
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 2, 'pageSizeParam' => false, 'forcePageParam' => false]);
        $posts = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('index', compact('posts', 'pages'));
    }
    
    public function actionTest() {
        return $this->render('test');
    }
    
    public function actionHello() {
        return $this->render('hello');
    }
}
