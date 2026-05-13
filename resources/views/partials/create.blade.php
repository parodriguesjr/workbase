@extends('adminlte::page')

@section('title', 'Novo Usuário')

@section('content_header')
<h1>Novo Usuário</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header bg-primary text-white">
        <h3 class="card-title">Cadastrar Usuário</h3>
    </div>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <div class="card-body">

            <div class="form-group">
                <label>Nome</label>
                <input type="text" name="name" class="form-control" placeholder="Digite o nome">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Digite o email">
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i> Salvar
            </button>

            <a href="{{ route('users.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Voltar
            </a>
        </div>
    </form>
</div>

@stop