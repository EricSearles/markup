<?php

namespace App\Services;

use App\Repositories\SalaRepository;
use App\Services\AgendaService;

class SalaService
{
    private $salaRepository;
    private $agendaService;

    public function __construct(SalaRepository $salaRepository, AgendaService $agendaService)
    {
        $this->salaRepository = $salaRepository;
        $this->agendaService = $agendaService;
    }

    public function retornarSalas($paginas)
    {
        //return $this->salaRepository->findAll();
        return $this->salaRepository->retornarSalasComPaginacao($paginas);
    }

    public function retornaSalasComAgenda()
    {
        return $this->agendaService->mostraAgendaAdmin();
    }

    public function retornaAgendaPorSala($id)
    {
        return $this->agendaService->mostraAgendaPorSala($id);
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
