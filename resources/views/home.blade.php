@extends('layouts.app')
@section('content')
    <section class="container">
        <div class="box">            
            <div class="header-box">
                <div class="titulo">
                    <h5>Pedido de venda</h5>
                    <span>Listagem</span>
                </div>
                <div class="btn-padrao">
                    <a class="btn-ancora" href="{{route('produtos.create')}}">Novo pedido</a>
                </div>  
            </div>           
        </div>  
    </section>
@endsection