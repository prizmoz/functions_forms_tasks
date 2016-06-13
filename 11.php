<?php
/**
 * 11. Написать функцию, которая в качестве аргумента принимает строку,
 * и форматирует ее таким образом, что каждое новое предложение начиняется с большой буквы.
 * Пример:<br><br>
 * Входная строка: 'а васька слушает да ест. а воз и ныне там.
 * а вы друзья как ни садитесь, все в музыканты не годитесь. а король-то — голый.
 * а ларчик просто открывался.а там хоть трава не расти.';<br><br>
 * Строка, возвращенная функцией :  'А Васька слушает да ест. А воз и ныне там.
 * А вы друзья как ни садитесь, все в музыканты не годитесь.
 * А король-то — голый. А ларчик просто открывался.А там хоть трава не расти.';</p>
 */
function mb_ucfirst($text) {
    $arr = explode('.', $text);
    // удлаем пустой элемент из массива, который там оказывается, если в последнем предложении стоит точка.
    $new_arr = array_diff($arr, array(''));
    $res = '';
    foreach ($new_arr as $key => $sentence) {
        $sentence = trim($sentence);
        if ($key != count($arr) - 1) {
            $res .= mb_strtoupper(mb_substr($sentence, 0, 1)) . mb_substr($sentence, 1) . ". ";
        } else {
            $res .= mb_strtoupper(mb_substr($sentence, 0, 1)) . mb_substr($sentence, 1) . ".";
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
            <h2 align="center">Заглавные буквы в предложениях</h2>
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
            echo "<div class=\"col-md-12 alert alert-success\">" . mb_ucfirst($_POST['text']) . "</div>";
        }
        ?>
    </div>
</div>
</body>
</html>

