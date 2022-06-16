<?php

declare(strict_types=1);

use App\Service\ControllerProvider;

require '../vendor/autoload.php';

$page = $_GET['page'];

if (!empty($page) && is_string($page)) {
    $targetController = (new ControllerProvider())->getController($page);

    if (!$targetController) {
        die(sprintf("Controller for page '%s' is not found in ControllerProvider", $page));
    }

    $response = new $targetController();
} else {
    die('Omg! Page is not defined.');
}