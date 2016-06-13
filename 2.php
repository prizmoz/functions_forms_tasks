<?php
/**
 * 2. Создать форму с элементом textarea.
 * При отправке формы скрипт должен выдавать ТОП3 длинных слов в тексте. Реализовать с помощью функции.</p>
 */

if (!empty($_POST)) {
    $text = $_POST['text'];
    $arr = explode(' ', $text);
    usort($arr, function ($a,$b)
    {
        return mb_strlen($b) - mb_strlen($a);

    });

    $res = '';
    foreach ($arr as $key => $word) {
        if ($key < 2) {
            $res .= "{$word}, ";
        }
        elseif ($key == 2) {
            $res .= "{$word}";
        }
    }

}

?>

<html>
<head>
    <title>Задание 2</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <meta charset="utf-8">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 align="center">Топ 3 длинных слова</h2>
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
        if (!empty($res)) {
            echo "<div class=\"col-md-12 alert alert-success\">{$res}</div>";
        }
        ?>
    </div>
</div>
</body>
</html>
