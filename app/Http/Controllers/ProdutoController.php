<?php

namespace App\Http\Controllers;

use App\Models\Produtos;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $dados = Produtos::get();
        return view('produto.produtos')->with('produtos', $dados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produto.cadastrar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $dados = new Produtos();
       $dados->nome         = $request->nome;
       $dados->codbarras    = $request->codbarras;
       $dados->qtde         = $request->qtde;
       $dados->id_aplicacao = $request->aplicacao;
       $dados->id_un        = $request->unidade;
       $dados->referencia   = $request->referencia;
       $dados->precocusto   = str_replace(',' , '.', str_replace('.' ,'' , $request->precocusto));
       $dados->precovenda   = str_replace(',' , '.', str_replace('.' ,'' , $request->precovenda));
       $dados->porclucro    = str_replace(',' , '.', str_replace('.' ,'' , $request->porclucro));
       $dados->save();
       
       return redirect()->route('produtos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('produto.editar');
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