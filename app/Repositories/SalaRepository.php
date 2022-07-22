<?php

namespace App\Repositories;

use App\Contracts\Repository\RepositoryInterface;

use App\Models\Sala;

class SalaRepository extends Repository implements RepositoryInterface
{
    protected $modelClass = Sala::class;

    private function retornarSalas() 
    {
        return $this->findAll();
    }

    public function buscaSalaPeloNome($nome)
    {       
        $sala = Sala::where('nome',$nome)->get();

            if($sala->isEmpty()) {
                return false;
            }

        return true;
    }
}

