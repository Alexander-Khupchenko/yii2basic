<?php

use app\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Document</title>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>
        
        <div class="wrap">
            <div class="container">
                <ul class="nav nav-pills">
                    <li role="presentation" class="active"><?= Html::a('Главная', '/yii2basic/web/') ?></li>
                    <li role="presentation"><?= Html::a('Статьи', ['posstt/index']) ?></li>
                    <li role="presentation"><?= Html::a('Статья', ['posstt/show']) ?></li>
                </ul>
                
                <?= $content ?>
                
            </div>
        </div>
        
    <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
