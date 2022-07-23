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

    public function mostraAgenda()
    {
        return $this->agendaRepository->mostrarAgenda();
    }
}
