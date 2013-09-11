#!/usr/bin/env php
<?php

$opts = getopt('p:');
$port = isset($opts['p']) ? $opts['p'] : 5599;

$context = new \ZMQContext();
$socket = new \ZMQSocket($context, \ZMQ::SOCKET_REQ);

$socket->connect("tcp://localhost:{$port}");
$socket->setSockOpt(\ZMQ::SOCKOPT_LINGER, 0);

$socket->send('LOG');
$status = $socket->recv();

if ($status == 'OK') {

    $socket->send(json_encode(array(
        'user'      => rand(1000,10000),
        'timestamp' => date('c'),
        'event'     => 'Signup',
        'meta'      => array(
            'source' => 'facebook'
        )
    )));

    $response = $socket->recv();
    echo print_r(json_decode($response, true));

}