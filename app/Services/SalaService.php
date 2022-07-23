<?php

namespace App\Services;

use App\Repositories\SalaRepository;

class SalaService
{
    private $salaRepository;

    public function __construct(SalaRepository $salaRepository)
    {
        $this->salaRepository = $salaRepository;
    }

    public function retornarSalas()
    {
        return $this->salaRepository->findAll();
    }

    public function cadastraNovaSala($dados)
    {
        if($this->validaNomeDaSala($dados['nome'])){
            return false;
        }
        
        $this->salaRepository->insert($dados);
       
        return true;
    }

    public function buscaSala($id)
    {
        return $this->salaRepository->buscarSala($id);
    }

    public function editaSala($dados)
    {
        $id = $dados['id'];
        $this->salaRepository->editarSala($dados, $id);
    }

    public function deletaSala($id)
    {
        $this->salaRepository->deletarSala($id);
    }

    public function validaNomeDaSala($nome)
    {
       return $this->salaRepository->buscaSalaPeloNome($nome);
    }
}
