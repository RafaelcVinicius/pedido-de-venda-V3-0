@extends('layouts.app')
@section('content')
    <section class="container">
        <div class="box">            
            <div class="header-box">
                <div class="titulo">
                    <h5>Clientes</h5>
                    <span> Listagem de todos os clientes</span>
                </div>
                <div class="btn-padrao">
                    <a class="btn-ancora" href="{{route('clientes.create')}}">Novo cliente</a>
                </div>  
            </div>   
            <div class="corpo-box">
                <dados-tabela
                :url="'clientes'" 
                >
                    <th><p slot="thead-1">ID</p></th>
                    <th><p slot="thead-2">Nome</p></th>
                    <th><p slot="thead-3">CNPJ/CPF</p></th>
                    <th><p slot="thead-4">Telefone</p></th>
                    <th><p slot="thead-5"></p></th>
                    <th><p class="none" slot="thead-6"></p></th>
                    <th><p class="none" slot="thead-7"></p></th>
                <dados-tabela />
            </div>        
        </div>  
    </section>
@endsection