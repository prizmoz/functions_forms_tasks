<?php
/**
 * Есть текстовый файл. Необходимо удалить из него все слова, длина которых превыщает N символов.
 * Значение N задавать через форму.
 * Проверить работу на кириллических строках - найти ошибку, найти решение.
 */

/**
 * РЕЗЮМЕ
 * 1. Ваш скрипт удаляет СТРОКИ длиной более N символов, а должен только слова. В задаче не сказано, что в файле одна строка
 * содержит только одно слово.
 * 2. Строку $file = fopen('3.txt', 'w'); лучше разместить непосредственно перед fwrite($file, implode("", $arr)); т.к.
 * fopen() с ключом 'w' очищает файл. И если в цикле у Вас возникнет ошибка, то Вы потеряете исходный файл.
 * 3. Вывод сообщения "Строки удалены" лежит внутри HTML-коментария, поэтому пользователь этого сообщения не увидит
 */
$success = 0;
if (!empty($_POST)){
    $n = $_POST['n'];
    $arr = file('3.txt');
    $file = fopen('3.txt', 'w');
    echo '<br>';    //Зачем печатать перевод строки, если больше ничего не выводится?
    foreach ($arr as $key => $line) {
        if ((mb_strlen(trim($line)) > $n)) {
            unset($arr[$key]);
        }
    }
    fwrite($file, implode("", $arr));
    fclose($file);
    $success = 1;
}
?>
<html>
<head>
    <title>Задание 3</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <meta charset="utf-8">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 align="center">Удалить слова длинее, чем N символов</h2>
            <br>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form class="form-inline" role="form" method="post" action="">
                <div class="form-group">
                    <label for="n">Количество символов:</label>
                    <input type="text" class="form-control" id="n" name="n">
                </div>
                <button type="submit" class="btn btn-default">Отправить</button>
            </form>
        </div>
    </div>
    <!--
    <div class="row">
        <?php
        if ($success == 1) {
            echo "<div class=\"col-md-12 alert alert-success\">Строки удалены</div>";
        }
        ?>
     -->
</div>
</div>
</body>
</html>
