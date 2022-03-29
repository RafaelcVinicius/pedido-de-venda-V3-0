<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Produtos extends Model
{
    use HasFactory;

    protected $table = 'produtos';
    protected $primarykey = 'id';
    public $timestamps = true;


    public static function selectdados(){
        $produtos = Self::select(
           'id as campo1',
           'nome as campo2',
           'codbarras as campo3',
           'referencia as campo4' ,           
           'precovenda as campo5',           
           'qtde as campo6',           
           'ativo as campo7'           
       )->get();
       return $produtos;
   }
}