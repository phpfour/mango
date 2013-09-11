<?php

namespace Mango;

class Receiver
{
    /** @var Logger */
    protected $logger;

    /** @var int */
    protected $port;

    public function __construct($logger, $port = 5599)
    {
        $this->logger = $logger;
        $this->port = $port;
    }

    public function run()
    {
        $context  = new \ZMQContext();
        $receiver = new \ZMQSocket($context, \ZMQ::SOCKET_REP);
        $bindTo   = 'tcp://*:' . $this->port;

        echo "Binding to {$bindTo}\n";
        $receiver->bind($bindTo);

        while (TRUE) {

            $command = $receiver->recv();

            switch ($command) {

                case 'LOG':

                    $receiver->send('OK');

                    $msg = $receiver->recv();
                    $data = json_decode($msg, true);

                    $this->logger->log($data);

                    $response = json_encode(array('status' => 'OK'));
                    break;

                case 'ECHO':

                    $response = json_encode(array('status' => 'HELLO'));
                    break;

                default:
                    $response = 'UNKNOWN COMMAND';
                    break;
            }

            $receiver->send($response);
            echo "[" . date('Y-m-d H:i:s') . "] Responding to message: $command\n";

        }
    }
}