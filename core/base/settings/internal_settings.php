<?php
defined('VG_ACCESS') or die ('ACCESS DENIED');

const TEMPLATES = 'templates/defaults/';
const ADMIN_TEMPLATES = 'core/admin/views';

const COOKIE_VERSION = '1.0.0';
const CRYPT_KEY = '';
const COOKIE_TIME = 60;
const BLOCK_TIME = 3;

const QTY = 5;
const QTY_LINKS = 2;

const ADMIN_CSS_JS = [
    'styles' => [],
    'scripts' => []
];

use core\base\exceptions\RouteException;

function my_autoload($class_name){
    $class_name = str_replace('\\', '/', $class_name);
    include $class_name.'.php';
    if(!@include_once $class_name.'.php'){
        throw new RouteException('не верное имя класса для подключения'. $class_name);
    }
}
spl_autoload_register('my_autoload');
