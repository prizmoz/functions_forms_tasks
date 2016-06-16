<?php
/**
 * Создать страницу, на которой можно загрузить несколько фотографий в галерею.
 * Все загруженные фото должны помещаться в папку gallery и выводиться на странице в виде таблицы.
 */
include_once 'functions.php';

if (isset($_FILES['user_img'])) {
    if (!is_dir(__DIR__ . '/gallery')) {
       mkdir(__DIR__ . '/gallery') ;
    }
    $res = imgUpload($_FILES['user_img']);
}

$table = '<table class="table">';
$images = scandir(__DIR__ . '/gallery');

if (!empty($images)) {
    foreach ($images as $img) {
        if ($img === '.' || $img === '..') {
            continue;
        }
        $table .= "<tr><td align='center'><img class='img-rounded' src='gallery/$img' ></td></tr>";
    }
}
?>
<html>
<head>
    <title>Image Gallery</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>

<body>
<div class="container">
    <div class="row" align="center">
        <h1 align="center">Image Gallery</h1>
        <br>
        <form enctype="multipart/form-data"  action="" method="post" class="form-inline" role="form">

        	<div class="form-group">
        		<label class="sr-only" for="image">label</label>
<!--                <input type="hidden" name="MAX_FILE_SIZE" value="200000">-->
        		<input type="file" class="form-control" name="user_img[]" id="image" multiple>
        	</div>
        	<button type="submit" class="btn btn-success">Upload</button>
        </form>
    </div>
<br>
    <div class="row">
        <?php
        if (!isset($res)) {
            echo $table;
        }
        else {
            $res = implode('<br>', $res);
            echo "<div class='row alert alert-danger'>$res </div>";
            echo $table;
        }
        ?>
    </div>


</div>


</body>
</html>