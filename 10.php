<?php
/**
 * Написать функцию, которая считает количество уникальных слов в тексте.
 * Слова разделяются пробелами. Текст должен вводиться с формы.
 */
function countUnique($text)
{
    $arr = explode(" ", $text);
    $new_arr = array_unique($arr);
    $unique_length = count($new_arr);
    return $unique_length;
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
            <h2 align="center">Посчитать кол-во уникальных символов</h2>
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
            echo "<div class=\"col-md-12 alert alert-success\">Кол-во уникальных слов: " . countUnique($_POST['text']) . "</div>";
        }
        ?>
</div>
</div>
</body>
</html>
