@extends('layout') 

@section('title', 'editar usuário') 

@section('content') 
<section class="content-header"> 
    <div class="container-fluid"> 
        <div class="row mb-2"> 
            <div class="col-sm-6"> 
                <h1>editar usuário</h1> 
            </div> 
        </div> 
    </div> 
</section> 

<section class="content"> 
    <div class="container-fluid"> 
        
        {{-- Bloco para exibir a mensagem de sucesso --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="submit" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="card card-primary"> 
            <div class="card-header"> 
                <h3 class="card-title">editar cadastro</h3> 
            </div> 
            
            <form action="{{ route('usuarios.update', $usuario->id) }}" method="post"> 
                @csrf 
                @method('put') 
                
                <div class="card-body"> 
                    <div class="form-group"> 
                        <label>nome</label> 
                        <input type="text" name="name" class="form-control" value="{{ $usuario->name }}" required> 
                    </div> 
                    <div class="form-group"> 
                        <label>e-mail</label> 
                        <input type="email" name="email" class="form-control" value="{{ $usuario->email }}" required> 
                    </div> 
                </div> 
                
                <div class="card-footer"> 
                    <button type="submit" class="btn btn-success"> 
                        <i class="fas fa-save"></i> atualizar 
                    </button> 
                    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary"> cancelar </a> 
                </div>
            </form>
        </div>
    </div>
</section>
@endsection