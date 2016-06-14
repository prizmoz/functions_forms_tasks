<?php
/**
 * 8. Создать гостевую книгу, где любой человек может оставить комментарий в текстовом поле и добавить его.
 * Все добавленные комментарии выводятся над текстовым полем.
 * Реализовать проверку на наличие в тексте запрещенных слов, матов.
 * При наличии таких слов - выводить сообщение "Некорректный комментарий".
 * Реализовать удаление из комментария всех тегов, кроме тега &lt;b&gt;.</p>

 */

/**
 * РЕЗЮМЕ
 * 1. Вы неправильно использовали функцию strpos(). Надо поменять местами параметры, т.к. первым параметром должна
 * быть строка В КОТОРОЙ ищем, а вторым параметром - ЧТО ищем
 * 2. После return не должно быть break - он бессмыленен, т.к. return прерывает выполнение функции и отдает результат
 * в основной код
 * 3. Код
 * else {
 *     $error = "Некорректный комментарий";
 * }
 * излишен. В HTML достаточно делать проверку if($error){} и вывести текст ошибки в самом HTML
 * 4. Стоп-слова лучше занести в отдельный файл и читать его в массив. Таким образом будет возможность добавлять/удалять
 * слова без необходимости править код.
 */
function stopBadWords($string, $stopWords)
{
    $string = mb_strtolower($string);
    foreach ($stopWords as $word) {
        if ((strpos($word, $string)) !== false) {
            $error = true;
            return $error;
            break;
        }
    }
}

$comments = [];
$stopWords = ['виагра', 'сиськи', 'порно'];

if (!empty(trim($_POST['name'])) && !empty(trim($_POST['message']))) {
    $comment = [
        'name'      => strip_tags($_POST['name']),
        'message'   => strip_tags($_POST['message'], '<b>'),
    ];
    $error = stopBadWords ($comment['message'], $stopWords);
    if ($error == NULL) {
        $strComment = serialize($comment);
        $file = fopen('comments.txt', 'a');
        fwrite($file, $strComment . PHP_EOL);
        fclose($file);
    } else {
        $error = "Некорректный комментарий";
    }
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
    <? if ($error === "Некорректный комментарий"):?>
    <div class="row alert alert-danger"><?=$error?></div>
    <?endif;?>
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
