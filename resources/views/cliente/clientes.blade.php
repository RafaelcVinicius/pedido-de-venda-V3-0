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
                    <a class="btn-ancora" href="{{route('clientes.create')}}">Gravar</a>
                </div>  
            </div>   
            <div class="corpo-box">
            </div>        
        </div>  
    </section>
@endsection