<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use Illuminate\Http\Request;
use App\Services\HorarioService;

class HorarioController extends Controller
{

    private $horarioService;

    public function __construct(HorarioService $horarioService)
    {
        $this->horarioService = $horarioService;    
    }

    
    public function index()
    {
        $horariosCadastrados = $this->horarioService->retornaHorariosCadastrados();
        return view('horario.index', compact('horariosCadastrados'));
    }


    public function create()
    {
        return view('horario.create');
    }

    public function store(Request $request)
    {
        $dados = $request->only('inicio');
        $this->horarioService->cadastraNovoHorario($dados);
        
        return redirect('/horario')->with('status', 'Horário Criado.');
    }



    public function destroy($id)
    {
        if(!$this->horarioService->deletaHorario($id)){
            return back()->withErrors(['Não foi possível excluir este horário.']);
        };

        return redirect('/sala')->with('status', 'Horário excluido com sucesso.');
    }
}
