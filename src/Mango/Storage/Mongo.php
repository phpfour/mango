<?php

namespace Mango\Storage;

use MongoDB;
use MongoClient;
use MongoCollection;

class Mongo implements StorageInterface
{
    /** @var MongoClient */
    protected $client;

    /** @var MongoDB */
    protected $db;

    /** @var MongoCollection */
    protected $logs;

    public function __construct($config)
    {
        $this->connect($config);
    }

    public function connect($config)
    {
        $this->client = new \MongoClient();
        $this->db = $this->client->mango;
        $this->logs = $this->db->logs;
    }

    public function insert($data)
    {
        $this->logs->insert($data);
        return $data;
    }

    public function update($data, $id)
    {
        $this->logs->update(array('_id' => new \MongoId($id)), $data);
        return $data;
    }

    public function remove($id)
    {
        $this->logs->remove(array('_id' => new \MongoId($id)));
    }

    public function find($id)
    {
        return $this->logs->findOne(array('_id' => new \MongoId($id)));
    }

    public function findAll($query)
    {
        return $this->logs->find($query);
    }
}