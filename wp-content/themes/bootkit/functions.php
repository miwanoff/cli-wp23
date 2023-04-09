<?php

function my_filter_function1($str)
{
    $str = '<strong>' . $str . '</strong>';
    return $str; // возвращаем измененное значение!
}

add_filter('my_filter1', 'my_filter_function1');