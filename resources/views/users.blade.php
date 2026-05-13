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

            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <!-- Título da Lista -->
                    <h3 class="card-title mr-3">Lista de Usuários</h3>

                    <!-- Botão de Inclusão ao lado do título -->
                    <a href="{{ route('usuarios.create') }}" class="btn btn-success">
    <i class="fas fa-plus"></i> Novo Registro
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

                            <tbody>
                                @forelse($users as $usuario)
                                    <tr>
                                        <td>{{ $usuario->id }}</td>
                                        <td>{{ $usuario->name }}</td>
                                        <td>{{ $usuario->email }}</td>
                                        <td>
                                            <!-- Botão Editar -->
                                            <a href="{{ route('usuarios.edit', $usuario->id) }}"
                                               class="btn btn-sm btn-info"
                                               title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                            
                                            <!-- Formulário Excluir -->
                                            <form action="{{ route('usuarios.destroy', $usuario->id) }}"
                                                  method="POST"
                                                  style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                            
                                                <button type="submit"
                                                        class="btn btn-sm btn-danger"
                                                        title="Excluir"
                                                        onclick="return confirm('Tem certeza que deseja excluir?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
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
@endsection