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
                    <button class="btn-ancora" type="button" onclick="document.getElementById('form').submit()" >Gravar</button>
                </div>  
            </div>   
            <div class="corpo-box">
                <form id="form" action="{{route('produtos.store')}}" method="POST" class="corpo-box-form">
                    @csrf
                    <cadastro-produto />
                </form>
            </div>        
        </div>  
    </section>
@endsection