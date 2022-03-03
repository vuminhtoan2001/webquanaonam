<?php
$routes['default_controller'] = 'home';
$routes['default_action'] = 'index';
// Đường dẫn ảo -> Đường dẫn thật
$routes['san-pham'] = 'products/index';
$routes['danh-sach-san-pham'] = 'products/list';
$routes['trang-chu'] = 'home';
$routes['chi-tiet-san-pham'] = 'products/detail';
$routes['tin-tuc/.+-(\d+).html'] = 'news/category/$1';