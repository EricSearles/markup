@extends('layouts.app')
@section('content')
<div class="container">
    <div class="list-group-item">
        <div class="d-flex">
            <div class="mr-auto p-2">
                <h2 class="display-5 titulo">Visualizando {{ $sala->nome }}</h2>
                <a href="{{ route('agenda.criar', $sala) }}">Criar Horário na Agenda</a> |
                <a href="{{ route('sala.agenda') }}">Ver agenda</a> | 
                <a href="{{ route('sala') }}">Voltar</a><br>
                    @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                    @endif
            </div>
        </div>
    </div>
    <hr>

    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Data</th>
                    <th scope="col">Periodo</th>
                    <th scope="col">Início</th>
                    <th scope="col">Termino</th>
                    <th scope="col">Status</th>
                    <th scope="col">Responsável</th>
                </tr>
            </thead>

                <tbody>     
                    @foreach($dadosSala as $dados)   
                    <tr>
                        <th scope="row">{{ $dados->data }}</th>
                        <td>100</td>
                        <td>{{ $dados->inicio }}</td>
                        <td>{{ $dados->termino }}</td>
                        @if($sala->status_id != 6)
                        <td>{{ $dados->status }}</td>
                        <td>{{ $dados->name }}</td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
        </table>
        <h4><a href="{{ route('sala.edit',$sala) }}"> Desativar Sala<i class="fas fa-pencil-alt"> </i> </a></h4>
    </div>    
</div>
@stop


