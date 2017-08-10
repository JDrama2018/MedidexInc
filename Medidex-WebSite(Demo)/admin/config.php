<?php

defined('APP_PATH') || define('APP_PATH', dirname(__FILE__) . '/');

date_default_timezone_set("Europe/Athens");

error_reporting(E_ALL);
ini_set('display_errors', true);

// Header informations
header("Content-Type: text/html");
header('Cache-Control: no-cache');
header('Pragma: no-cache');

use Medidex\Libraries\Db;

$config = new \stdClass();

$server = array(
    'server'    =>  'localhost',
    'user'      =>  'root',
    'password'  =>  '20102011',
    'database'  =>  'medidex'
);

// Initialize the connection with label "MEDIDEX"
Db::getInstance(array('MEDIDEX' => $server));

return $config;
