<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteModel extends Model
{
    use HasFactory;

    // Definindo o nome correto da tabela no banco de dados
    protected $table = 'cliente'; // Isso garante que o Laravel utilize a tabela 'cliente'

    // Função para salvar um novo cliente
    public static function salvar(Request $request){
        $status = DB::table('cliente')->insert([
            'nome' => $request->input('nome'),
            'cpf' => $request->input('cpf'),
            'telefone' => $request->input('telefone'),
            'email' => $request->input('email')
        ]);
        return $status;
    }

    // Função para deletar um cliente
    public static function deletar($id){
        $status = DB::table('cliente')->where('id', $id)->delete();
        return $status;
    }

    // Função para listar todos os clientes
    public static function listar(){
        $clientes = DB::table('cliente')->get();
        return $clientes;
    }

    // Função para consultar um cliente específico
    public static function consultar($id){
        $cliente = DB::table('cliente')->where('id', $id)->first();
        return $cliente;
    }

    // Função para atualizar dados de um cliente
    public static function atualizar($id, $dados) {
        $cliente = DB::table('cliente')->where('id', $id)->update($dados);
        return $cliente;
    }
}
