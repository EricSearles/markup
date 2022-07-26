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

    public function retornarSalasComPaginacao($paginas) 
    {
        return $this->returnAllPagination($paginas);
    }

    public function buscarSala($id)
    {
        return $this->find($id);
    }

    public function buscaSalaPeloNome($nome)
    {       
        $sala = Sala::where('nome',$nome)->get();

            if($sala->isEmpty()) {
                return false;
            }

        return true;
    }

    public function editarSala($data, $id)
    {
        return $this->update($data, $id);
    }

    public function deletarSala($id)
    {
        return $this->delete($id);
    }
}

