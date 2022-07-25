<?php

namespace App\Services;


use App\Repositories\AgendaRepository;
class AgendaService
{
    public $agendaRepository;

    public function __construct(AgendaRepository $agendaRepository)
    {
        $this->agendaRepository = $agendaRepository;
    }

    public function mostraAgendaAdmin()
    {
        return $this->agendaRepository->mostrarAgendaAdmin();
    }

    public function mostraAgendaFuncionario()
    {
        return $this->agendaRepository->mostrarAgendaFuncionario();
    }

    public function agendaHorario(int $agenda_id, int $user_id)
    {
        return $this->agendaRepository->agendarHorario($agenda_id, $user_id);
    }

    public function cancelaHorario(int $agenda_id, int $user_id)
    {
        return $this->agendaRepository->cancelarHorario($agenda_id, $user_id);
    }
}
