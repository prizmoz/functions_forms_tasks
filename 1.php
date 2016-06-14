<?php
/**
 * 1. Создать форму с двумя элементами textarea.
 * При отправке формы скрипт должен выдавать только те слова, которые есть и в первом и во втором поле ввода.
Реализацию это логики необходимо поместить в функцию getCommonWords($a, $b), которая будет возвращать массив с общими словами.
 */

/**
 * РЕЗЮМЕ
 * 1. Функция preg_replace('/[^\w\s]/u', ' ', $a) не удалит лишние пробелы
 * 2. Цикл foreach ($result as $key => $word){} можно заменить одной функцией implode(', ', $result);
 * 3. В строке echo "<div class=\"col-md-12 alert alert-success\">{$resultText}</div>"; нет необходимости брать переменную
 * в фигурные скобки. Кроме того, более правильным вариантом будет такая строка:
 * <div class="col-md-12 alert alert-success"><?php echo $resultText;?></div>
 * 4. Вы не учли регистр букв. Для машины слова "Енисей" и "енисей" не являются одинаковыми
 */
// функция поиска общих элементов в двух массивах
function getCommonWords ($a, $b)
{
	$string1 = trim(preg_replace('/[^\w\s]/u', ' ', $a)); // удаляем знаки препинания и лишние пробелы
	$string2 = trim(preg_replace('/[^\w\s]/u', ' ', $b));
	$arr1 = explode(' ', $string1);
	$arr2 =	explode(' ', $string2);
	$result = array_intersect($arr1, $arr2);
	return $result;
}

$resultText = '';
$error = '';
if (!empty($_POST)) {
	$text1 = htmlentities($_POST['text1']);
	$text2 = htmlentities($_POST['text2']);
	$result = getCommonWords($text1,$text2); // массив с общими словами
	foreach ($result as $key => $word) {
		if ($key < count($result) - 1) {
			$resultText .= $word . ', ';
		} else {
			$resultText .= $word . '.';
		}
	}
}
?>
<html>
<head>
    <title>Задание 1</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <meta charset="utf-8">
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2 align="center">Поиск слов, которые есть и в первом, и во втором поле ввода</h2>
			<br>
		</div>
	</div>
	<form action="" method="post" role="form">
		<div class="row">
			<div class="col-md-6">
				<fieldset class="form-group">
					<label for="text1">Text 1</label>
					<textarea class="form-control" name="text1" id="text1" rows="3"></textarea>
				</fieldset>
			</div>
			<div class="col-md-6">
				<fieldset class="form-group">
					<label for="text2">Text 2</label>
					<textarea class="form-control" name="text2" id="text2" rows="3"></textarea>
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
		if (!empty($resultText)) {
			echo "<div class=\"col-md-12 alert alert-success\">{$resultText}</div>";
		}
		?>
		</div>
	</div>
</body>
</html>