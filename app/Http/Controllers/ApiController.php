<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClienteResource;
use App\Models\Clientes;
use App\Models\Produtos;
use Facade\FlareClient\Http\Client;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function produtos(){
        return json_encode(Produtos::selectdados());
    }
    public function produtoswhere(Request $request){
        $dados = Produtos::select(
            'id as campo1',
            'nome as campo2',
            'codbarras as campo3',
            'referencia as campo4' ,           
            'precovenda as campo5' ,           
            'qtde as campo6')
            ->where('nome', 'like', '%'.$request->pesquisa.'%')
            ->orWhere('id', 'like', '%'.$request->pesquisa.'%')
            ->take(10)->get();

        return json_encode($dados);
    }

    public function clientes(){
        return json_encode(Clientes::selectdados());
    }
    public function clienteswhere(Request $request){
        $dados = Clientes::select(
            'id as campo1',
            'nome as campo2',
            'cnpjcpf as campo3',
            'telefone as campo4' 
        )        
        ->where('nome', 'like', '%'.$request->pesquisa.'%')
        ->orWhere('cnpjcpf', 'like', '%'.$request->pesquisa.'%')
        ->take(10)->get();
        return json_encode($dados);
    }
}
