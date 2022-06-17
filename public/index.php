<?php

declare(strict_types=1);

use App\Service\ControllerProvider;

require '../vendor/autoload.php';

$page = $_GET['page'];

if (!empty($page) && is_string($page)) {
    $targetController = (new ControllerProvider())->getController($page);

    if ($targetController) {
        $response = new $targetController();
        die('All good.');
    }
}

http_response_code(404);
var_dump(sprintf("Controller for page '%s' is not found in ControllerProvider", $page));
die('Omg! Page or Controller not found.');