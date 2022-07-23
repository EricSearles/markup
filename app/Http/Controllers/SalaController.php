<?php

namespace App\Http\Controllers;

use App\Services\SalaService;

use Illuminate\Http\Request;

class SalaController extends Controller
{
    private $salaService;

    public function __construct(SalaService $salaService)
    {
        $this->salaService = $salaService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $salas = $this->salaService->retornarSalas();

        return view ('sala/index', compact('salas'));
    }


    public function create()
    {
        return view ('sala/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'status_id' => 'required'
        ]);

        $dados = $request->only(['nome','status_id']);

            if(!$this->salaService->cadastraNovaSala($dados)){
                return back()->withErrors(['Não foi possível criar, já existe uma sala com este nome: '.$dados['nome']]);;
            }

        return redirect('/sala')->with('status', 'Sala criada com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sala  $sala
     * @return \Illuminate\Http\Response
     */
    public function show(Sala $sala)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sala  $sala
     * @return \Illuminate\Http\Response
     */
    public function edit(Sala $sala)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sala  $sala
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sala $sala)
    {
        //
    }


    public function destroy($id)
    {
        if(!$this->salaService->deletaSala($id)){
            return back()->withErrors(['Não foi possível excluir a sala.']);
        };

        return redirect('/sala')->with('status', 'Sala excluida com sucesso.');
    }
}
