<?php

function imgUpload($user_img)
{
    $errors = [];
    $upload_dir = __DIR__ . '/gallery/';
    $max_size = 100000;
    $allowed_types = ['image/gif', 'image/jpeg', 'image/pjpeg', 'image/png'];


    foreach ($user_img['tmp_name'] as $key => $img) {
        if (!in_array($user_img['type'][$key], $allowed_types)) {
            $errors[] = 'Not allowed file type.';
        }

        if ($user_img['size'][$key] > $max_size) {
            $errors[] = 'File is to large.';
        }
        
        if (empty($errors)) {
            move_uploaded_file($img, $upload_dir . $user_img['name'][$key]);
        }
        else {
            return $errors;
        }
    }
}
