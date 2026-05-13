{{-- resources/views/usuarios/create.blade.php --}}

@extends('layout')

@section('title', 'Novo Usuário')

@section('content')

<!-- Content Header -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Novo Registro</h1>
            </div>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('usuarios.index') }}">Usuários</a>
                    </li>
                    <li class="breadcrumb-item active">Novo Registro</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">

    <div class="container-fluid">

        <div class="card card-primary card-outline">

            <div class="card-header">
                <h3 class="card-title">
                    Cadastro de Usuário
                </h3>
            </div>

            <form action="{{ route('usuarios.store') }}" method="POST">

                @csrf

                <div class="card-body">

                    {{-- Nome --}}
                    <div class="form-group">
                        <label for="name">Nome do Usuário</label>

                        <input
                            type="text"
                            name="name"
                            id="name"
                            class="form-control"
                            placeholder="Digite o nome do usuário"
                            required
                        >
                    </div>

                    {{-- E-mail --}}
                    <div class="form-group">
                        <label for="email">E-mail</label>

                        <input
                            type="email"
                            name="email"
                            id="email"
                            class="form-control"
                            placeholder="Digite o e-mail"
                            required
                        >
                    </div>

                </div>

                <div class="card-footer">

                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Salvar
                    </button>

                    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">
    Cancelar
</a>

                </div>

            </form>

        </div>

    </div>

</section>

@endsection