<?php

namespace App\Http\Controllers;

use App\Services\AgendaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public $agendaService;

    public function __construct(AgendaService $agendaService)
    {
        $this->middleware('auth');
        $this->agendaService = $agendaService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function exibeAgendaFuncionario(Request $request)
    {
        $id = Auth::user()->id;
        $agendas = $this->agendaService->mostraAgendaFuncionario();

        return view('agenda/agenda-funcionario', compact('id', 'agendas'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        return view('adminHome');
    }
}
