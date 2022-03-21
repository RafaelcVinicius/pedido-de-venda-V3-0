@extends('layouts.app')
@section('content')
    <section class="container">
        <div class="box">            
            <div class="header-box">
                <div class="titulo">
                    <h5>Produtos</h5>
                    <span> <a class="link-header" href="{{route('produtos.store')}}">Listagem de todos os produtos</a> > Cadastro de produtos</span>
                </div>
                <div class="btn-padrao">
                    <a class="btn-ancora" href="{{route('produtos.store')}}">Gravar</a>
                </div>  
            </div>   
            <div class="corpo-box">
                <cadastro-produto />
            </div>        
        </div>  
    </section>
@endsection