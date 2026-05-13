@extends('layout')

@section('title', 'Editar Usuário')

@section('content')

<section class="content-header">

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">
                <h1>Editar Usuário</h1>
            </div>

        </div>

    </div>

</section>

<section class="content">

    <div class="container-fluid">

        <div class="card card-primary">

            <div class="card-header">
                <h3 class="card-title">Editar Cadastro</h3>
            </div>

            <form action="{{ route('usuarios.update', $usuario->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="card-body">

                    <div class="form-group">

                        <label>Nome</label>

                        <input type="text"
                               name="name"
                               class="form-control"
                               value="{{ $usuario->name }}"
                               required>

                    </div>

                    <div class="form-group">

                        <label>E-mail</label>

                        <input type="email"
                               name="email"
                               class="form-control"
                               value="{{ $usuario->email }}"
                               required>

                    </div>

                </div>

                <div class="card-footer">

                    <button type="submit"
                            class="btn btn-success">

                        <i class="fas fa-save"></i> Atualizar

                    </button>

                    <a href="{{ route('usuarios.index') }}"
                       class="btn btn-secondary">

                        Cancelar

                    </a>

                </div>

            </form>

        </div>

    </div>

</section>

@endsection