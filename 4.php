<?php
/**
 * 4. Написать функцию, которая выводит список файлов в заданной директории.
 *  Директория задается как параметр функции.
 */

$dir = __DIR__; // указываем директорию, в которой будем искать файлы. В данном случае ищем в текущей директории скрипта.
function searchFiles($dir)
{
    $result = '';
    $arr = scandir($dir);
    foreach ($arr as $item) {
        if (is_file($item)) {
           $result .= $item . '<br>';
        }
    }
    return $result;
}
echo 'Файлы в директории ' . $dir . ': <br>';
echo searchFiles($dir);