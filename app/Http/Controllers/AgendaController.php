<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Services\AgendaService;
use Illuminate\Http\Request;

class AgendaController extends Controller
{

    public $agendaService;

    public function __construct(AgendaService $agendaService)
    {
        $this->agendaService = $agendaService;
    }

    public function alteraData($dia)
    {
        $this->adicionaDiaCalendario($dia);
    }

    public function agendar(int $agenda_id, int $user_id)
    {
        if(!$this->agendaService->agendaHorario($agenda_id, $user_id)){
            return back()->withErrors(['Não foi possível agendar este horário.']);
        };

        return redirect('/funcionario-agenda')->with('status', 'Horário Agendado.');

    }

    public function cancelar(int $agenda_id, int $user_id)
    {
        if(!$this->agendaService->cancelaHorario($agenda_id, $user_id)){
            return back()->withErrors(['Não foi possível fazer esta alteração.']);
        };

        return redirect('/funcionario-agenda')->with('status', 'Horário Cancelado!');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($dados)
    {
        $sala = $dados;
        $horarios = $this->agendaService->buscaHorariosCadastrados();
        return view('agenda/create-agenda-admin', compact('sala', 'horarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = $request->only('sala_id','horario_id','data','status_id');
        if(!$this->agendaService->criaHorarioAgenda($dados)){
            return back()->withErrors(['Não foi possível criar este horário.']); 
        }

        return redirect('/sala/agenda')->with('status', 'Horário criado com sucesso.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function show(Agenda $agenda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function edit(Agenda $agenda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agenda $agenda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agenda $agenda)
    {
        //
    }
}
