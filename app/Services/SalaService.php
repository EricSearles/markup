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

    public function retornaSalas() : string
    {
        return $this->salaRepository->findAll();
    }
}
