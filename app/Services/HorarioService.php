<?php

namespace App\Services;

use App\Repositories\HorarioRepository;

class HorarioService
{
    private $horarioRepository;

    public function __construct(HorarioRepository $horarioRepository)
    {
        $this->horarioRepository = $horarioRepository;
    }

    public function retornaHorariosCadastrados()
    {
        return $this->horarioRepository->retornarHorario();
    }

    public function cadastraNovoHorario($dados)
    {
        $timestamp = strtotime($dados['inicio']) + 60*60;
        $dados['termino'] = strftime('%H:%M', $timestamp);
        
        return $this->horarioRepository->cadastrarHorario($dados);

    }

    public function deletaHorario($id)
    {
        $this->horarioRepository->deletarHorario($id);
    }
}
