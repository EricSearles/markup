@extends('layouts.app')
@section('content')
<div class="container">
    <div class="list-group-item">
        <div class="d-flex">
            <div class="mr-auto p-2">
                <h2 class="display-5 titulo">Agenda</h2>
                <!-- <a href="{{ route('sala.criar') }}">Criar Nova Sala</a><br>
                <a href="#">Criar Novo Horário</a><br> -->
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
                    <th scope="col">Sala</th>
                    <th scope="col">Início</th>
                    <th scope="col">Termino</th>
                    <th scope="col">Status</th>
                    <th scope="col">Responsável</th>
                </tr>
                </thead>
            <tbody>       
                @foreach($agendas as $agenda) 
                    <tr>
                    <th scope="row">{{ $agenda->data }}</th>
                    <td>{{ $agenda->sala }}</td>
                    <td>{{ $agenda->inicio }}</td>
                    <td>{{ $agenda->termino }}</td>                   
                    <td>{{ $agenda->status }}</td>
                    <td>{{ $agenda->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>    
</div>
@stop


