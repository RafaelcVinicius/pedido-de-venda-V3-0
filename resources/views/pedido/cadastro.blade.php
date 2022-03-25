@extends('layouts.app')
@section('content')
    <section class="container">
        <div class="box">            
            <div class="header-box">
                <div class="titulo">
                    <h5>Pedidos</h5>
                    <span> <a class="link-header" href="{{route('produtos.store')}}">Listagem de todos os Pedidos</a> > Cadastro de Pedido</span>
                </div>
                <div class="btn-padrao">
                   <botao-salvar-pedido />
                </div>  
            </div>   
            <div class="corpo-box-fundo-off">
                <pedido-de-venda 
                :vendedor="{{json_encode(Auth::user()->name)}}" :idvendedor="{{json_encode(Auth::user()->id)}}"
                > 
                </pedido-de-venda>
            </div>        
        </div>  
    </section>
@endsection