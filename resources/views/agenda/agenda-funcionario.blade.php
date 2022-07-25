@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="list-group-item">
            <div class="d-flex">
                <div class="mr-auto p-2">
                    <h2 class="display-5 titulo">Agenda</h2>
                    <a href="{{ route('home') }}">Voltar</a><br>
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
                    <th scope="col">Responsavel</th>
                    <th scope="col" colspan="2">Ação</th>
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
                        <td>
                            @if(!$agenda->user_id)<a href="{{ route('agendar', [$agenda->agenda_id, $id]) }}">Agendar</a>@endif
                            @if($agenda->user_id == $id)<a href="{{ route('cancelar', [$agenda->agenda_id, $id]) }}">Cancelar</a>@endif
                                @if($agenda->user_id AND $agenda->user_id != $id) Bloqueada para reserva @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@stop
