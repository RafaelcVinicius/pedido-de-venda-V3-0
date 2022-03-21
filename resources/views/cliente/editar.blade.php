@extends('layouts.app')
@section('content')
    <section class="container">
        <div class="box">            
            <div class="header-box">
                <div class="titulo">
                    <h5>Clientes</h5>
                    <span> <a class="link-header" href="{{route('clientes.index')}}">Listagem de todos os clientes</a> > Cadastro de cliente</span>
                </div>
                <div class="btn-padrao">
                    <a class="btn-ancora" href="{{route('clientes.store')}}">Gravar</a>
                </div>  
            </div>   
            <div class="corpo-box">
                <cadastro-cliente />
            </div>        
        </div>  
    </section>
@endsection