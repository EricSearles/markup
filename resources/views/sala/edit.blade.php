@extends('layouts.app')
@section('content')
<div class="content p-1">
    <div class="list-group-item">
        <div class="d-flex">
            <div class="mr-auto p-2">
                <h2 class="display-5 titulo">Alterar Dados Sala</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <hr>
        <form action={{ route('sala.update', $sala) }} method="POST" enctype="multipart/form-data">
            @csrf
            @method('put');
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label> Sala </label>
                    <input name="nome" type="text" class="form-control" value="{{ $sala->nome }}">
                </div>

                <div class="form-group col-md-2">
                    <label for="status"></span> Situação da Sala</label>
                    <select name="status_id" class="form-control">
                        <option value="0">Selecione o tipo</option>
                        <option value="1" @if ($sala->status_id == 1) selected @endif >Ativo</option>
                        <option value="2" @if ($sala->status_id == 2) selected @endif >Desativado</option>
                    </select>
                </div>
            </div>
            <input type="hidden" name="id" value="{{ $sala->id }}">
            <button type="submit" class="btn btn-primary">Editar</button>
            <a href="{{ route('sala') }}">Voltar</a>
        </form>

</div>

@stop



