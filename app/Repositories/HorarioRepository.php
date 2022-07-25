<?php

namespace App\Repositories;

use App\Contracts\Repository\RepositoryInterface;

use App\Models\Horario;

class HorarioRepository extends Repository implements RepositoryInterface
{
    protected $modelClass = Horario::class;

    public function retornarHorario()
    {
        return $this->findAll();
    }

    public function cadastrarHorario($dados)
    {
        return $this->insert($dados);
    }

    public function deletarHorario($id)
    {
        return $this->delete($id);
    }

}
