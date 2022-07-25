@extends('layouts.app')
@section('content')
<div class="container">
    <div class="list-group-item">
        <div class="d-flex">
            <div class="mr-auto p-2">
                <h2 class="display-5 titulo">Horarios</h2>
                <a href="{{ route('horario.criar') }}">Criar Novo Horário</a> |
                <a href="{{ route('admin.home') }}">Voltar</a><br>
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
                    <th scope="col">Início</th>
                    <th scope="col">Término</th>
                    <th scope="col">Ações</th>
                </tr>
                </thead>
            <tbody>
                @foreach($horariosCadastrados as $horario)
                    <tr>
                    <th scope="row">{{ $horario->id }}</th>
                    <td>{{ $horario->inicio }}</td>
                    <td>{{ $horario->termino }}</td>
                    <td>
                        <a href="{{ route('horario.deletar', $horario->id)}}"> Apagar <i class="far fa-trash-alt"></i> </a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@stop


