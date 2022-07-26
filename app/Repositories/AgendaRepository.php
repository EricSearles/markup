<?php

namespace App\Repositories;

use App\Models\Agenda;

use Illuminate\Support\Facades\DB;
use App\Contracts\Repository\RepositoryInterface;

class AgendaRepository extends Repository implements RepositoryInterface
{
    protected $modelClass = Agenda::class;

    public function mostrarAgendaAdmin()
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

    public function mostrarAgendaFuncionario()
    {
        return  DB::table('agendas')
            ->join('salas', 'agendas.sala_id', '=', 'salas.id')
            ->join('horarios', 'agendas.horario_id', '=', 'horarios.id')
            ->join('status', 'agendas.status_id', '=', 'status.id')
            ->leftJoin('users', 'agendas.user_id', '=', 'users.id')
            ->select(   'salas.id','salas.nome as sala',
                'agendas.id as agenda_id',
                'agendas.data',
                'horarios.inicio',
                'horarios.termino',
                'status.id as status_id',
                'status.nome as status',
                'users.id as user_id',
                'users.name')
            ->where('salas.status_id',1)
            ->orderBy('agendas.data')
            ->orderBy('sala')
            ->orderBy('horarios.inicio')
            ->paginate(10);
    }

    public function mostrarAgendaPorSala($id)
    {
        return  DB::table('agendas')
        ->join('salas', 'agendas.sala_id', '=', 'salas.id')
        ->join('horarios', 'agendas.horario_id', '=', 'horarios.id')
        ->join('status', 'agendas.status_id', '=', 'status.id')
        ->leftJoin('users', 'agendas.user_id', '=', 'users.id')
        ->select(   'salas.id','salas.nome as sala',
            'agendas.id as agenda_id',
            'agendas.data as data',
            'horarios.inicio',
            'horarios.termino',
            'status.id as status_id',
            'status.nome as status',
            'users.id as user_id',
            'users.name')
        ->where('salas.id', $id)
        ->orderBy('agendas.data')
        ->orderBy('sala')
        ->orderBy('horarios.inicio')
        ->get();
        //->paginate(10);
    }

    public function criarHorarioNaAgenda($data)
    {
        return $this->insert($data);
    } 

    public function agendarHorario(int $agenda_id, int $user_id)
    {

        return Agenda::where('id', $agenda_id)->update(['status_id' => 3, 'user_id'=>$user_id]);

    }

    public function cancelarHorario(int $agenda_id, int $user_id)
    {

        return Agenda::where('id', $agenda_id)->update(['status_id' => 6, 'user_id'=>null]);

    }


}
