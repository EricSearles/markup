<?php

namespace App\Repositories;

use App\Contracts\Repository\RepositoryInterface;

class Repository implements RepositoryInterface
{
    protected $modelClass;

    public function find($id)
    {
        return app($this->modelClass)->find($id);

    }

    public function findAll()
    {
        return app($this->modelClass)->all();
    }

    public function insert(array $data)
    {
        return app($this->modelClass)->create($data);
    }

    public function update(array $data, $id)
    {
        return app($this->modelClass)->find($id)->update($data);
    }

    public function delete($id)
    {
        return app($this->modelClass)->find($id)->delete();
    }
}
