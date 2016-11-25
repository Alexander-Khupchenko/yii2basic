<?php

use app\assets\AppAsset;

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
        <h1>Hello, BASIC!</h1>
        <?= $content ?>
    <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
