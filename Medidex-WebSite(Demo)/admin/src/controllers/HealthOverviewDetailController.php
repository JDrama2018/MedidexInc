<?php

namespace Medidex\Controllers;

use Medidex\Libraries\Request;

class HealthOverviewDetailController extends ApiController
{
    private $req;

    public function __construct($request)
    {
        $this->req = $request->request;
        parent::__construct($request);
    }

    public function indexAction()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: /');
        }

        $user = $_SESSION['user'];
        $username = $user['username'];
        $type = $user['type'];
        include APP_PATH . '/src/views/health_overview_detail.php';
    }
}