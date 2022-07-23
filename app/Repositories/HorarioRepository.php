<?php

namespace App\Repositories;

use App\Contracts\Repository\RepositoryInterface;

class HorarioRepository extends Repository implements RepositoryInterface
{
    protected $modelClass = Horario::class;

}
