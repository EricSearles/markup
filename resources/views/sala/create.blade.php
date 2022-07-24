@extends('layouts.app')
@section('content')
<div class="container">
    <div class="list-group-item">
        <div class="d-flex">
            <div class="mr-auto p-2">
                <h2 class="display-5 titulo">Cadastrar Sala</h2>
                <a href="{{ route('sala') }}">Voltar</a><br>
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

        <form action={{ route('sala.cadastrar') }} method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label><span class="text-danger">*</span> Sala </label>
                    <input name="nome" type="text" class="form-control" placeholder="Digite o nome da sala">
                </div>

                <div class="form-group col-md-2">
                    <label for="status"><span class="text-danger">*</span> Situação da Sala</label>
                    <select name="status_id" class="form-control">
                        <option value="0">Selecione a tipo</option>
                        <option value="1">Ativo</option>
                        <option value="2">Desativado</option>
                    </select>
                </div>
            </div>
            <p>
                <span class="text-danger">* </span>Campo obrigatório
            </p>

            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>

</div>

@stop



