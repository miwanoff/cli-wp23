<?php
wp_head(); // здесь автоматически будет подключен файл functions.php
$str = 'Kit';
echo $str = apply_filters('my_filter1', $str); // <strong>Kit</strong>