<?php

namespace App\Contracts\Repository;

interface RepositoryInterface
{
    public function find($id);

    public function findAll();

    public function insert(array $data);

    public function update(array $data, $id);

    public function delete($id);
}
