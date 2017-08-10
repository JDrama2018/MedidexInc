<?php

use Medidex\Libraries\Request;
use Medidex\Controllers\NotFoundController;

$request = Request::createFromGlobals();
$notFound = false;
$method = $request->method();
$controller = $request->controller();

//exit($method . " - " . $controller);

try {
    if (file_exists(APP_PATH . "/src/controllers/" . $controller . '.php')) {
        require_once APP_PATH . "/src/controllers/$controller.php";
        $class = '\Medidex\Controllers\\'.$controller;
        if (method_exists($class, $method)) {
            $handler = new $class($request);
            $handler->{$method}();
        } else {
            throw new \Exception('Not found');
        }
    } else {
        throw new \Exception('Not found');
    }
} catch (\Exception $e) {
    $nf = new NotFoundController($request);
    $nf->process();
}
