#!/usr/bin/env php
<?php

require __DIR__ . '/../app/bootstrap.php';

use Mango\Logger;
use Mango\Receiver;
use Mango\Storage\Mongo;

$opts = getopt('p:');
$port = isset($opts['p']) ? $opts['p'] : 5599;

$logger = new Logger(new Mongo(array()));
$receiver = new Receiver($logger, $port);

$receiver->run();