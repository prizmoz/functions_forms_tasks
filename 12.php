<?php
/**
 * 12. Написать функцию, которая в качестве аргумента принимает строку, и форматирует ее таким образом,
 * что предложения идут в обратном порядке.
 * Пример: Входная строка:
 * 'А Васька слушает да ест. А воз и ныне там. А вы друзья как ни садитесь, все в музыканты не годитесь.
 * А король-то — голый. А ларчик просто открывался. А там хоть трава не расти.'
 * Строка, возвращенная функцией :  'А там хоть трава не расти. А ларчик просто открывался.
 * А король-то — голый. А вы друзья как ни садитесь, все в музыканты не годитесь.
 * А воз и ныне там.А Васька слушает да ест.'
 */

function sentenceReverse($text) {
    $arr = array_reverse(explode('.', $text));
    // удлаем пустой элемент из массива, который там оказывается, если в последнем предложении стоит точка.
    $new_arr = array_diff($arr, array(''));
    $res = '';
    foreach ($new_arr as $key => $sentence) {
        $sentence = trim($sentence);
        if ($key != count($arr) - 1) {
            $res .= $sentence . ". ";
        }
        else {
            $res .= $sentence . ".";
        }
    }
    return $res;
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
            <h2 align="center">Вывести предложения в обратном порядке</h2>
            <br>
        </div>
    </div>
    <form action="" method="post" role="form">
        <div class="row">
            <div class="col-md-12">
                <fieldset class="form-group">
                    <textarea class="form-control" name="text" rows="3"></textarea>
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
            echo "<div class=\"col-md-12 alert alert-success\">" . sentenceReverse($_POST['text']) . "</div>";
        }
        ?>
    </div>
</div>
</body>
</html>

