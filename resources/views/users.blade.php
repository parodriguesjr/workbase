@extends('layout')

{{-- diretiva do Blade para "enviar" um pedaço de texto para um local específico no layout pai --}}
@section('title', 'Usuários')

@section('content')
    <!-- 1. Cabeçalho da Página (Content Header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Gerenciamento de Usuário</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{-- alterar o link "#" para {{ url('nome') }} para redirecionar para o a URL --}}
                         <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Início</a></li>
                        <li class="breadcrumb-item active">Usuários</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. Conteúdo Principal -->
    <section class="content">
        <div class="container-fluid">

            {{-- Bloco inserido aqui para exibir as mensagens do Controller (Cadastro e Edição) --}}
            @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="icon fas fa-check"></i> {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

{{-- Bloco para exibir mensagens de Exclusão/Erro (Vermelho) --}}
@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="icon fas fa-ban"></i> {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <!-- Título da Lista -->
                    <h3 class="card-title mr-3">Lista de Usuários</h3>

                    <!-- Botão de Inclusão ao lado do título -->
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalNovoUsuario">
                        <i class="fas fa-plus"></i> Novo Usuário
                    </a>

                    <!-- Caixa de Pesquisa alinhada à direita -->
                    <div class="card-tools ml-auto">
                        <form action="#" method="GET">
                            <div class="input-group input-group-sm" style="width: 250px;">
                                <input type="text" name="search" class="form-control float-right" placeholder="Pesquisar..."
                                    value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Tabela -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>
                                    <a href="{{ route('usuarios.index', ['column' => 'id', 'direction' => $orderDirection == 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}">
                                        ID <i class="fas fa-sort{{ $orderColumn == 'id' ? ($orderDirection == 'asc' ? '-up' : '-down') : '' }}"></i>
                                    </a>
                                </th>
                                <th>
                                    <a href="{{ route('usuarios.index', ['column' => 'name', 'direction' => $orderDirection == 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}">
                                        Nome <i class="fas fa-sort{{ $orderColumn == 'name' ? ($orderDirection == 'asc' ? '-up' : '-down') : '' }}"></i>
                                    </a>
                                </th>
                                <th>
                                    <a href="{{ route('usuarios.index', ['column' => 'email', 'direction' => $orderDirection == 'asc' ? 'desc' : 'asc', 'search' => request('search')]) }}">
                                        Email <i class="fas fa-sort{{ $orderColumn == 'email' ? ($orderDirection == 'asc' ? '-up' : '-down') : '' }}"></i>
                                    </a>
                                </th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $usuario)
                                <tr>
                                    <td>{{ $usuario->id }}</td>
                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td>
                                        <!-- Botão Editar -->
                                        <a href="{{ route('usuarios.edit', $usuario->id) }}"
                                            class="btn btn-info">
                                         
                                             <i class="fas fa-edit"></i>
                                         
                                         </a>
                        
                                        <!-- Formulário Excluir -->
                                        <button
    type="button"
    class="btn btn-danger"
    data-bs-toggle="modal"
    data-bs-target="#deleteModal"
    data-id="{{ $usuario->id }}"
    data-nome="{{ $usuario->name }}"
>
    <i class="fas fa-trash"></i>
</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">
                                        Nenhum usuário encontrado.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="card-footer clearfix">
                    <div class="float-right">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('usuarios.create')
@endsection
<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">
                    Confirmar Exclusão
                </h5>

                <button
                    type="button"
                    class="btn-close btn-close-white"
                    data-bs-dismiss="modal">
                </button>
            </div>

            <div class="modal-body">
                Deseja realmente excluir o usuário:

                <strong id="nomeUsuario"></strong> ?
            </div>

            <div class="modal-footer">

                <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal">
                    Cancelar
                </button>

                <form id="formDelete" method="POST">

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">
                        Sim, excluir
                    </button>

                </form>

            </div>

        </div>
    </div>
</div>
<script>
    const deleteModal = document.getElementById('deleteModal');

    deleteModal.addEventListener('show.bs.modal', function (event) {

        const button = event.relatedTarget;

        const userId = button.getAttribute('data-id');
        const userName = button.getAttribute('data-nome');

        document.getElementById('nomeUsuario').textContent = userName;

        const form = document.getElementById('formDelete');

        form.action = `/users/${userId}`;

    });
</script>