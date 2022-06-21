<?php

declare(strict_types=1);

use App\Container;
use App\Service\ControllerProvider;

require '../vendor/autoload.php';

session_start();

$page = $_GET['page'];
if (!empty($page) && is_string($page)) {
    $targetController = (new ControllerProvider())->getController($page);

    if ($targetController) {
        $response = (new Container())->get($targetController)->index();
        die();
    }
}

http_response_code(404);
die('Omg! Page or Controller not found. Probably it is missing in ControllerProvider?');