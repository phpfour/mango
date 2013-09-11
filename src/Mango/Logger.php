<?php

namespace Mango;

use Mango\Storage\StorageInterface;

class Logger
{
    /**
     * @var StorageInterface
     */
    private $storage;

    public function __construct(StorageInterface $storage)
    {
        $this->storage = $storage;
    }

    public function log($data)
    {
        return $this->storage->insert($data);
    }
}