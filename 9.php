<?php
/**
 * Написать функцию, которая переворачивает строку.
 * Было "abcde", должна выдать "edcba". Ввод текста реализовать с помощью формы.
 */

/**
 * РЕЗЮМЕ
 * 1. Функция stringReverse() у Вас всегда будет возвращать "edcba" :)
 * 2. Кроме того, Ваш код не будет работать с кириллицей
 * 3. Здесь stringReverse($_POST[$text]) ошибка. Переменная $text не определена
 */
function stringReverse($string){
    $new_string = '';
    for ($i = strlen($string) - 1; $i >=0; $i--){
        $new_string .= $string[$i];
    }
    return $new_string;
}
?>

<html>
<head>
    <title>Задание 9</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <meta charset="utf-8">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 align="center">Перевернуть строку</h2>
            <br>
        </div>
    </div>
    <form action="" method="post" role="form">
        <div class="row">
            <div class="col-md-12">
                <fieldset class="form-group">
                    <textarea class="form-control" name="text" id="text1" rows="3"></textarea>
                </fieldset>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </div>
        </div>
    </form>
    <div class="row">
        <?php
        if (!empty($_POST)) {
            echo "<div class=\"col-md-12 alert alert-success\">" . stringReverse($_POST['text']) . "</div>";
        }
        ?>
    </div>
</div>
</body>
</html>
