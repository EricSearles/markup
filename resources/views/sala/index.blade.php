@extends('layouts.app')
@section('content')
<div class="container">
    <div class="list-group-item">
        <div class="d-flex">
            <div class="mr-auto p-2">
                <h2 class="display-5 titulo">Salas</h2>
                <a href="{{ route('sala.criar') }}">Criar Nova Sala</a><br>
                <a href="#">Criar Novo Horário</a><br>
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
                    <th scope="col">#</th>
                    <th scope="col">Sala</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ações</th>
                </tr>
                </thead>
            <tbody>
                @foreach($salas as $sala)           
                    <tr>
                    <th scope="row">{{ $sala->id }}</th>
                    <td>{{ $sala->nome }}</td>
                    <td>{{ $sala->status_id }}</td>
                    <td> 
                        <a href="#"> Ver<i class="far fa-eye"> </i> </a>
                        <a href="{{ route('sala.edit',$sala) }}"> Editar<i class="fas fa-pencil-alt"> </i> </a>
                        <a href="{{ route('sala.deletar',$sala->id) }}"> Apagar<i class="far fa-trash-alt"></i> </a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>    
</div>
@stop


