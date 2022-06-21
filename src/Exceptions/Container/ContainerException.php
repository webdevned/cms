<?php

namespace App\Exceptions\Container;

use Psr\Container\ContainerExceptionInterface;
use Exception;

/**
 * Class could not be instantiated
 */
class ContainerException extends Exception implements ContainerExceptionInterface {}