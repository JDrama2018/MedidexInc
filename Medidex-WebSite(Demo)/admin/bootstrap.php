<?php

require_once dirname(__FILE__) . '/src/libs/Autoloader.php';

// instantiate the loader
$loader = new \Medidex\Autoloader;

// register the autoloader
$loader->register();

// register the base directories for the namespace prefix
$loader->registerNamespaces(
    array(
        'Medidex\Libraries' => APP_PATH . '/src/libs/',
        'Medidex\Controllers' => APP_PATH . '/src/controllers/',
        'Medidex\Models' => APP_PATH . '/src/models/'
    )
);