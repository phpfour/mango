<?php

use Composer\Autoload\ClassLoader;

require __DIR__ . '/../vendor/autoload.php';

$classLoader = new ClassLoader();

$classLoader->add('Mango', __DIR__ . '/../src');
$classLoader->register();