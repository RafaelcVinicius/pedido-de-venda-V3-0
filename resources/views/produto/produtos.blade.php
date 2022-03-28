@extends('layouts.app')
@section('content')
    <section class="container">
        <div class="box">            
            <div class="header-box">
                <div class="titulo">
                    <h5>Produtos</h5>
                    <span>Listagem de todos os produtos</span>
                </div>
                <div class="btn-padrao">
                    <a class="btn-ancora" href="{{route('produtos.create')}}">Novo produto</a>
                </div>  
            </div>   
            <div class="corpo-box">
                <dados-tabela
                :url="'produtos'" 
                :vshow="true"
                >
                    <th><p slot="thead-1">ID</p></th>
                    <th><p slot="thead-2">Nome</p></th>
                    <th><p slot="thead-3">Código de Barras</p></th>
                    <th><p slot="thead-4">Referencia</p></th>
                    <th><p slot="thead-5">Preço de Venda</p></th>
                    <th><p slot="thead-6">Qtde atual</p></th>
                    <th><p slot="thead-7"></p></th>
                <dados-tabela />
            </div>        
        </div>  
    </section>
@endsection