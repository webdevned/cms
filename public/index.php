<?php

declare(strict_types=1);

use App\Service\ControllerProvider;

require '../vendor/autoload.php';

$page = $_GET['page'];

if (!empty($page) && is_string($page)) {
    $firstToUpper = strtoupper($page[0]);
    $page = substr_replace($page, $firstToUpper, 0, 1);

    $targetController = 'App\Controller\\' . $page . 'Controller';

    if (in_array($targetController, (new ControllerProvider())->getList())) {
        $page = new $targetController();
    } else {
        die('Omg! Controller not found: ' . $targetController);
    }
} else {
    die('Omg! Page is not defined.');
}