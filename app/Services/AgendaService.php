<?php

namespace App\Services;


use App\Repositories\AgendaRepository;

use App\Models\Horario;
class AgendaService
{
    public $agendaRepository;
    public $horarioService;

    public function __construct(AgendaRepository $agendaRepository, HorarioService $horarioService)
    {
        $this->agendaRepository = $agendaRepository;
        $this->horarioService = $horarioService;
    }

    public function mostraAgendaAdmin()
    {
        return $this->agendaRepository->mostrarAgendaAdmin();
    }

    public function mostraAgendaFuncionario()
    {
        return $this->agendaRepository->mostrarAgendaFuncionario();
    }

    public function mostraAgendaPorSala($id)
    {
        return $this->agendaRepository->mostrarAgendaPorSala($id);
    }

    public function criaHorarioAgenda($dados)
    {
        return $this->agendaRepository->criarHorarioNaAgenda($dados);
    }

    public function agendaHorario(int $agenda_id, int $user_id)
    {
        return $this->agendaRepository->agendarHorario($agenda_id, $user_id);
    }

    public function cancelaHorario(int $agenda_id, int $user_id)
    {
        return $this->agendaRepository->cancelarHorario($agenda_id, $user_id);
    }

    public function buscaHorariosCadastrados()
    {
        return $this->horarioService->retornaHorariosCadastrados();
    }
}
