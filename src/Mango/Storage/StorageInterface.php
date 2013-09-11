<?php

namespace Mango\Storage;

interface StorageInterface
{
    public function connect($config);
    public function insert($data);
    public function update($data, $id);
    public function remove($id);
    public function find($id);
    public function findAll($query);
}