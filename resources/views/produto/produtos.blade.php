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

            </div>        
        </div>  
    </section>
@endsection