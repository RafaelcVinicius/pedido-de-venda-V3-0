<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index(){
        return view('pedido.index');
    }
    public function create(){
        return view('pedido.cadastro');
    }
}
