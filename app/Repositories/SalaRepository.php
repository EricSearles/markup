<?php

namespace App\Repositories;

use App\Contracts\Repository\RepositoryInterface;

use App\Models\Sala;

class SalaRepository extends Repository implements RepositoryInterface
{
    protected $modelClass = Sala::class;

    private function retornaSalas() {
        return $this->findAll();
    }
}

