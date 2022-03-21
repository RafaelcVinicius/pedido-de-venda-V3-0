<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\Enderecocliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = Clientes::get();
        return view('cliente.clientes')->with('clientes', $dados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.cadastrar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = new Clientes();
        $dados->nome = $request->nome;
        $dados->cnpjcpf = $request->cnpjcpf;
        $dados->telefone = $request->telefone;
        $dados->save();

        $dadosendereco = new Enderecocliente();
        $dadosendereco->id_cliente = $dados->id;
        $dadosendereco->uf = $request->uf;
        $dadosendereco->cep = $request->cep;
        $dadosendereco->municipio = $request->municipio;
        $dadosendereco->endereco = $request->endereco;
        $dadosendereco->numero = $request->numero;
        $dadosendereco->bairro = $request->bairro;
        $dadosendereco->complemento = $request->complemento;
        $dadosendereco->save();
               
        return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}