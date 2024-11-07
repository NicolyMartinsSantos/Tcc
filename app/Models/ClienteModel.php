<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ClienteModel extends Model
{
    use HasFactory;

    public static function salvar(Request $request){
        $status = DB::table('cliente_models')->insert([
            'nome' =>$request->input('nome'),
            'cpf' =>$request->input('cpf'),
            'telefone' =>$request->input('telefone'),
            'email' =>$request->input('email')
        ]);
        return $status;
    }

    public static function deletar($id){
        $status = DB::table('cliente')->delete($id);
        return $status;
    }
    
    public static function listar(){
        $clientes = DB::table('cliente')->get();
        return $clientes;

    }

    public static function consultar($id){
        $cliente = DB::table('cliente')->where('id', $id)->first();
        return $cliente;
    }
    public static function atualizar($id, $dados) {
        $cliente = DB::table('cliente')->where('id', $id)->update($dados);
        return $cliente;
    }
}
