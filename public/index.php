<?php

declare(strict_types=1);

require '../vendor/autoload.php';

$controll = [
    'Detail',
    'Home',
    'List'
];

$class = 'App\Controll\\' . $controll[random_int(0, 2)] . 'Controll';

$page = new $class();