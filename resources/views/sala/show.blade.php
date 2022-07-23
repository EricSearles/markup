@extends('layouts.app')
@section('content')
<div class="container">
    <div class="list-group-item">
        <div class="d-flex">
            <div class="mr-auto p-2">
                <h2 class="display-5 titulo">Visualizando {{ $sala->nome }}</h2>
                <a href="{{ route('sala.criar') }}">Criar Nova Sala</a><br>
                <a href="{{ route('sala.agenda') }}">Ver agenda</a><br>
                <a href="#">Criar Novo Horário</a><br>
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
                    <th scope="col">Ações</th>
                </tr>
                </thead>
            <tbody>        
                    <tr>
                    <th scope="row">23/07/2022</th>
                    <td>1</td>
                    <td>10:00</td>
                    <td>11:00</td>
                    @if($sala->status_id != 6)
                    <td>Reservado {{ $sala->status_id }}</td>
                    <td>Responsável</td>
                    @endif
                    <td> 
                        <!-- <a href="#"> Ver<i class="far fa-eye"> </i> </a> -->
                        <a href="{{ route('sala.edit',$sala) }}"> Editar<i class="fas fa-pencil-alt"> </i> </a>
                        <!-- <a href="{{ route('sala.deletar',$sala->id) }}"> Apagar<i class="far fa-trash-alt"></i> </a> -->
                    </td>
                    <tr>
                    <th scope="row">23/07/2022</th>
                    <td>2</td>
                    <td>11:00</td>
                    <td>12:00</td>
                    <td>Livre</td>
                    <td>Responsável</td>
                    <td> 
                        <!-- <a href="#"> Ver<i class="far fa-eye"> </i> </a> -->
                        <a href="{{ route('sala.edit',$sala) }}"> Editar<i class="fas fa-pencil-alt"> </i> </a>
                        <!-- <a href="{{ route('sala.deletar',$sala->id) }}"> Apagar<i class="far fa-trash-alt"></i> </a> -->
                    </td>
                    <tr>
                    <th scope="row">23/07/2022</th>
                    <td>3</td>
                    <td>13:00</td>
                    <td>14:00</td>
                    <td>Livre</td>
                    <td>Responsável</td>
                    <td> 
                        <!-- <a href="#"> Ver<i class="far fa-eye"> </i> </a> -->
                        <a href="{{ route('sala.edit',$sala) }}"> Editar<i class="fas fa-pencil-alt"> </i> </a>
                        <!-- <a href="{{ route('sala.deletar',$sala->id) }}"> Apagar<i class="far fa-trash-alt"></i> </a> -->
                    </td>
                    <tr>
                    <th scope="row">23/07/2022</th>
                    <td>4</td>
                    <td>13:00</td>
                    <td>14:00</td>
                    <td>Livre</td>
                    <td>Responsável</td>
                    <td> 
                        <!-- <a href="#"> Ver<i class="far fa-eye"> </i> </a> -->
                        <a href="{{ route('sala.edit',$sala) }}"> Editar<i class="fas fa-pencil-alt"> </i> </a>
                        <!-- <a href="{{ route('sala.deletar',$sala->id) }}"> Apagar<i class="far fa-trash-alt"></i> </a> -->
                    </td>
                    </tr>
            </tbody>
        </table>
    </div>    
</div>
@stop


