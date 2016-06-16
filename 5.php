<?php
/**
 * Написать функцию, которая выводит список файлов в заданной директории, которые содержат искомое слово.
 * Директория и искомое слово задаются как параметры функции.
 */

$dir = __DIR__;
$word = 'php';

function fileSearch ($dir, $word)
{
    if (!is_dir($dir)) {
        return 'This is not a folder';
    }

    $list = scandir($dir);
    $res = [];

    foreach ($list as $file) {
        if (is_dir($file)) {
            continue;
        }
    if (stripos($file, $word) !== false) {
        $res [] = $file;
    }
    }
    return $res;
}

$files = implode('<br>', fileSearch($dir, $word));
echo $files;

