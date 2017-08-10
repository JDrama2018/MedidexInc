<?php

session_start();

define('APP_PATH', dirname(__FILE__));

try {
    /**
     * Read auto-loader
     */
    include APP_PATH . '/bootstrap.php';
    /**
     * Read the configuration
     */
    $config = include APP_PATH . '/config.php';
    /**
     * Load application core
     */
    include APP_PATH . '/src/application.php';
} catch (\Exception $e) {
    echo $e->getMessage();
}