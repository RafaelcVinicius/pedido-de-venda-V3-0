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
                    <button class="btn-ancora" type="button" onclick="document.getElementById('form').submit()" >Gravar</button>
                </div>  
            </div>   
            <div class="corpo-box">
                <form id="form" action="{{route('clientes.store')}}" method="post" class="corpo-box-form">
                    @csrf
                    <cadastro-cliente />
                </form>
            </div>        
        </div>  
    </section>
@endsection