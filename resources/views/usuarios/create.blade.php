{{-- resources/views/usuarios/create.blade.php --}}

<div class="modal fade" id="modalNovoUsuario" tabindex="-1" role="dialog" aria-labelledby="modalNovoUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content card card-primary card-outline"> {{-- Mantém a bordinha azul do AdminLTE --}}
            
            <!-- Cabeçalho do Modal -->
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold text-dark" id="modalNovoUsuarioLabel">
                    <i class="fas fa-user-plus text-primary mr-2"></i> Cadastro de Usuário
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Formulário -->
            <form action="{{ route('usuarios.store') }}" method="POST">
                @csrf

                <!-- Corpo do Modal -->
                <div class="modal-body">
                    
                    {{-- Bloco para exibir erros rápidos caso queira usar --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

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

                <!-- Rodapé do Modal (Usando seus botões originais adaptados) -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Cancelar
                    </button>
                    
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Salvar
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>