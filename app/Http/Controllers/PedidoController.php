<?php

namespace App\Http\Controllers;

use App\Models\Formadepagamento;
use App\Models\Itempedido;
use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    
    public function index(){
        return view('pedido.index');
    }
    public function create(){
        return view('pedido.cadastro');
    }

    public function store(Request $request){

        $data = $request->get('data');

        // dd($data['formasDePagamento'][0]);

        if($data['status'] == "Aberto" ){            
            $pedido = new Pedido();
            $pedido->id_cliente      = $data['cliente']['id'];
            $pedido->id_vendedor     = $data['vendedor']['id'];
            $pedido->email           = $data['email'];
            $pedido->situacao        = "Aberto";
            $pedido->previsaoentrega = $data['previsaoEntrega'];
            $pedido->save();

            foreach($data['itens'] as $item){
                $pedidoitem = new Itempedido();
                $pedidoitem->id_pedido        = $pedido->id;
                $pedidoitem->id_produto      = $item['id'];
                $pedidoitem->valor           = $item['valor'];
                $pedidoitem->percdesconto    = $item['desconto'];
                $pedidoitem->percacrescimo   = $item['acrescimo'];
                $pedidoitem->qtde            = $item['qtde'];
                $pedidoitem->save();                

            };
            foreach($data['formasDePagamento'] as $item){
                if($item['valor'] > 0){
                    $pedidoespecie = new Formadepagamento();
                    $pedidoespecie->id_pedido       = $pedido->id;
                    $pedidoespecie->id_especie      = $item['id'];
                    $pedidoespecie->valorpago       = str_replace(',' , '.', str_replace('.' ,'' , $item['valor']));
                    $pedidoespecie->save();      
                }
            };
        }
        elseif($data['status'] == "Finalizado" ){
            $pedido = new Pedido();
            $pedido->id_cliente      = $data['cliente']['id'];
            $pedido->id_vendedor     = $data['vendedor']['id'];
            $pedido->email           = $data['email'];
            $pedido->situacao        = "Finalizado";
            $pedido->previsaoentrega = $data['previsaoEntrega'];
            $pedido->save();

            foreach($data['itens'] as $item){
                $pedidoitem = new Itempedido();
                $pedidoitem->id_pedido        = $pedido->id;
                $pedidoitem->id_produto      = $item['id'];
                $pedidoitem->valor           = $item['valor'];
                $pedidoitem->percdesconto    = $item['desconto'];
                $pedidoitem->percacrescimo   = $item['acrescimo'];
                $pedidoitem->qtde            = $item['qtde'];
                $pedidoitem->save();                

            };
            foreach($data['formasDePagamento'] as $item){
                if($item['valor'] > 0){
                    $pedidoespecie = new Formadepagamento();
                    $pedidoespecie->id_pedido       = $pedido->id;
                    $pedidoespecie->id_especie      = $item['id'];
                    $pedidoespecie->valorpago       = str_replace(',' , '.', str_replace('.' ,'' , $item['valor']));
                    $pedidoespecie->save();      
                }
            };
        }
        elseif($data['status'] == "Cancelado" ){
            $pedido = new Pedido();
            $pedido->id_cliente      = $data['cliente']['id'];
            $pedido->id_vendedor     = $data['vendedor']['id'];
            $pedido->email           = $data['email'];
            $pedido->situacao        = "Cancelado";
            $pedido->previsaoentrega = $data['previsaoEntrega'];
            $pedido->save();

            foreach($data['itens'] as $item){
                $pedidoitem = new Itempedido();
                $pedidoitem->id_pedido        = $pedido->id;
                $pedidoitem->id_produto      = $item['id'];
                $pedidoitem->valor           = $item['valor'];
                $pedidoitem->percdesconto    = $item['desconto'];
                $pedidoitem->percacrescimo   = $item['acrescimo'];
                $pedidoitem->qtde            = $item['qtde'];
                $pedidoitem->save();                

            };
            foreach($data['formasDePagamento'] as $item){
                if($item['valor'] > 0){
                    $pedidoespecie = new Formadepagamento();
                    $pedidoespecie->id_pedido       = $pedido->id;
                    $pedidoespecie->id_especie      = $item['id'];
                    $pedidoespecie->valorpago       = str_replace(',' , '.', str_replace('.' ,'' , $item['valor']));
                    $pedidoespecie->save();      
                }
            };
        }

        redirect()->route('pedido.index');

    }

    public function edit(){
        return View('pedido.editar');
    }

}