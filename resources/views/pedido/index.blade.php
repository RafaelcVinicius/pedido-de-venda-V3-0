@extends('layouts.app')
@section('content')
    <section class="container">
        <div class="box">            
            <div class="header-box">
                <div class="titulo">
                    <h5>Pedidos</h5>
                    <span>Listagem de todos os pedidos</span>
                </div>
                <div class="btn-padrao">
                    <a class="btn-ancora" href="{{route('pedido.create')}}">Novo pedido</a>
                </div>  
            </div>           
            <div class="corpo-box">
                <dados-tabela
                :url="'pedido'" 
                :vshow="false"
                :editurl="{{json_encode(route('pedido.edit', '_ID_'))}}"
                
                >
                    <th><p slot="thead-1">ID</p></th>
                    <th><p slot="thead-2">Cliente</p></th>
                    <th><p slot="thead-3">Previsão entrega</p></th>
                    <th><p slot="thead-4">Situção</p></th>
                    <th><p slot="thead-5"></p></th>
                    <th><p slot="thead-6"></p></th>
                    <th><p slot="thead-7"></p></th>
                <dados-tabela />
            </div>        
        </div>  
    </section>
@endsection