<?php

namespace App\Repositories;


use Illuminate\Support\Facades\DB;
use App\Contracts\Repository\RepositoryInterface;

class AgendaRepository extends Repository implements RepositoryInterface
{
    protected $modelClass = Agenda::class;

    public function mostrarAgenda()
    {
        return  DB::table('agendas')
        ->join('salas', 'agendas.sala_id', '=', 'salas.id')
        ->join('horarios', 'agendas.horario_id', '=', 'horarios.id')
        ->join('status', 'agendas.status_id', '=', 'status.id')
        ->join('users', 'agendas.user_id', '=', 'users.id')
        ->select(   'salas.nome as sala', 
                    'agendas.data',
                    'horarios.inicio',
                    'horarios.termino',
                    'status.nome as status',
                    'users.name' )
        ->where('salas.status_id',1)
        ->orderBy('sala')
        ->paginate(10);
    }

}
