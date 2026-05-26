<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsuarioController extends Controller
{
    // LISTAGEM
    public function index(Request $request)
    {
        // Captura os parâmetros da URL ou define padrões
        $search = $request->query('search');
        $orderColumn = $request->query('column', 'id'); // Padrão é ID
        $orderDirection = $request->query('direction', 'asc'); // Padrão é Ascendente
    
        $users = User::when($search, function($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                             ->orWhere('email', 'like', "%{$search}%")
                             ->orWhere('id', $search);
            })
            ->orderBy($orderColumn, $orderDirection)
            ->paginate(5)
            ->withQueryString(); // Importante: mantém os filtros ao trocar de página
    
        return view('users', compact('users', 'orderColumn', 'orderDirection'));
    }

    // FORMULÁRIO NOVO
    public function create()
    {
        return view('usuarios.create');
    }

    // SALVAR
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('123456'),
        ]);

        return redirect()
            ->route('usuarios.index')
            ->with('success', 'Usuário cadastrado com sucesso!');
    }

    // FORMULÁRIO EDITAR
    public function edit($id)
    {
        $usuario = User::findOrFail($id);

        return view('edit-user', compact('usuario'));
    }

    // ATUALIZAR
    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $usuario->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()
    ->back() // Isso faz voltar para a mesma tela de edição
    ->with('success', 'Usuário atualizado!');
    }

    // EXCLUIR
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);

        $usuario->delete();

        return redirect()
        ->route('usuarios.index')
        ->with('error', 'Usuário excluído com sucesso!');
    }
}