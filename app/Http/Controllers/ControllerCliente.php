<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\clienteModel;
use Illuminate\Support\Facades\DB;

class ControllerCliente extends Controller
{
    public function create(){
        session()->forget('Cliente cadastrado com sucesso');
        return view('Cliente.create');
    }

    public function store(Request $request){
        $status = ClienteModel::salvar($request);

        if ($status) {
            return redirect()->back()->with('mensagem', 'Cliente cadastrado com sucesso');
        } else {
            return redirect()->back()->with('mensagem', 'Erro ao cadastrar o cliente. Tente novamente');
        }
    }

    public function index(){
        $clientes = ClienteModel::listar();
        return view('Cliente.index', compact('clientes'));
    }

    public function destroy($id){
        $status = ClienteModel::deletar($id);
        if ($status) {
            return redirect('listarCliente')->with('mensagem', 'Cliente deletado com sucesso!');
        } else {
            return redirect('listarCliente')->with('mensagem', 'Cliente não encontrado.');
        }
    }

    public function edit($id){
        $cliente = ClienteModel::consultar($id);
        return view('Cliente.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
{
    // Valida os dados do formulário
    $request->validate([
        'nome' => 'required|string|max:255',
        'cpf' => 'required|string|max:14',
        'telefone' => 'required|string|max:15',
        'email' => 'required|string|email|max:100',
    ]);

    // Encontra o cliente pelo ID
    $cliente = ClienteModel::find($id);

    if ($cliente) {
        // Atualiza os dados do cliente
        $cliente->nome = $request->input('nome');
        $cliente->cpf = $request->input('cpf');
        $cliente->telefone = $request->input('telefone');
        $cliente->email = $request->input('email');
        $cliente->save(); // Salva as alterações

        return redirect('listarCliente')->with('mensagem', 'Cliente atualizado com sucesso!');
    } else {
        return redirect('listarCliente')->with('mensagem', 'Cliente não encontrado.');
    }
}

}
