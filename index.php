<?php
define('VG_ACCESS', true);

header('Content-Type: text/html; charset=utf-8');

session_start();

use core\base\controllers\RouteController;
use core\base\settings\Settings;
use core\base\settings\BuySettings;

require_once 'config.php';
require_once 'core/base/settings/internal_settings.php';
require_once 'core/libraries/functions.php';


try{
    RouteController::getInstance();
}
catch(RouteException $e){
   exit($e -> getMessage());
}
