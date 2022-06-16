<?php

declare(strict_types=1);

require '../vendor/autoload.php';

$page = $_GET['page'];

if ($page) {
    $firstToUpper = strtoupper($page[0]);
    $page = substr_replace($page, $firstToUpper, 0, 1);
} else {
//    die('Omg! Page is not defined.');
}

$class = 'App\Controll\\' . $page . 'Controll';

$page = new $class();