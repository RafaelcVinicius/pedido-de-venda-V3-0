<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClienteResource;
use App\Models\Aplicacaoproduto;
use App\Models\Cidade;
use App\Models\Clientes;
use App\Models\Especies;
use App\Models\Formaentrega;
use App\Models\Produtos;
use App\Models\Uf;
use App\Models\Uncomercial;
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

    //consulta todas as especies

    public function especies(){
        $dados = Especies::all();

        return json_encode($dados);
    }

    //mostra as formas de entrega 
    public function formasentrega(){
        $dados = Formaentrega::all();
        return json_encode($dados);
    }

    //consulta uf e cidade
    public function consultauf(){
        $dados = Uf::all();
        return json_encode($dados);
    }
    public function consultacidadesuf(Request $request){
        $dados = Cidade::where('id_uf', $request->idcidade)->get();

        return json_encode($dados);
    }
    public function consultaUn(){
        $dados = Uncomercial::all();

        return json_encode($dados);
    }

    public function consultaAplicaca(){
        $dados = Aplicacaoproduto::all();

        return json_encode($dados);
    }
}
