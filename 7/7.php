<?php
/**
 * 7. Создать гостевую книгу, где любой человек может оставить комментарий в текстовом поле и добавить его.
 * Все добавленные комментарии выводятся над текстовым полем.<
 */
$comments = [];
if (!empty(trim($_POST['name'])) && !empty(trim($_POST['message']))) {
    $comment = [
        'name'      => htmlentities(trim($_POST['name'])),
        'message'   => htmlentities(trim($_POST['message'])),
    ];
    $strComment = serialize($comment);
    $file = fopen('comments.txt', 'a');
    fwrite($file, $strComment . PHP_EOL);
    fclose($file);
}

if (file_exists('comments.txt')){
    $file = fopen('comments.txt', 'r');
    while (($str = fgets($file))) {
        $comments[] = unserialize($str);
    }
}
?>


<html>
<head>
    <title>Задание 7</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <meta charset="utf-8">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 align="center">Гостевая книга</h2>
            <br>
        </div>
    </div>
    <?foreach ($comments as $comment) : ?>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?=$comment['name']?></h3>
            </div>
            <div class="panel-body">
                <?=$comment['message']?>
            </div>

        </div>
    </div>
    <?endforeach;?>
    <form action="" method="post" role="form">
        <div class="row">
            <div class="col-md-12">
                <fieldset class="form-group">
                    <input type="text" name="name" class="form-control" value="" placeholder="Введите ваше имя..." required="required" >
                </fieldset>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <fieldset class="form-group">
                    <textarea class="form-control" name="message" rows="5" placeholder="Введите комментарий..."></textarea>
                </fieldset>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary btn-block">Отправить</button>
            </div>
        </div>
    </form>
</div>
</div>
</body>
</html>
