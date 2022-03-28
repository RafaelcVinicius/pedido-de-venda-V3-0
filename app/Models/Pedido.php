<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Clientes;
use App\Models\User;
use App\Models\Itempedido;
use Illuminate\Support\Facades\DB;
use stdClass;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedido';
    protected $primarykey = 'id';
    public $timestamps = true;

   
    public function cliente(){
        return $this->hasOne(Clientes::class, 'id', 'id_cliente');
    }

    public function user(){
        return $this->hasOne(User::class, 'id', 'id_vendedor');
    }

    public function itens(){
        return $this->hasMany(Itempedido::class, 'id_venda', 'id');
    }

    public function getTotalProdutosAttribute() {    

        $produto = DB::table('itempedido')->select(DB::raw(' cast(SUM(valor * qtde)as decimal(15,2) ) as valorTotal'))->where('id_venda', $this->id)->first();
        return $produto;
    }
    public function getTotalPedidoAttribute() {    
        $produto = DB::table('itempedido')->select(DB::raw(' cast(SUM(((percacrescimo / 100) * (valor * qtde) - (percdesconto / 100) * (valor * qtde)) + valor * qtde)as decimal(15,2)) as valorTotal'))->where('id_venda', $this->id)->first();
        return $produto;
    }

    public function getTotalAcrescimoAttribute() {    

        $produto = DB::table('itempedido')->select(DB::raw('cast(SUM((percacrescimo / 100) * (valor * qtde))as decimal(15,2)) as valorTotal'))->where('id_venda', $this->id)->first();
        return $produto;
    }

    public function getTotalDescontoAttribute() {    

        $produto = DB::table('itempedido')->select(DB::raw('cast(SUM((percdesconto / 100) * (valor * qtde))as decimal(15,2)) as valorTotal'))->where('id_venda', $this->id)->first();
        return $produto;
    }

    public static function selectdados(){
        $produtos = Self::select(
           'id as campo1',
           'id_cliente as campo2',
           'previsaoentrega as campo3',
           'situacao as campo4',                
       )->get();
       return $produtos;
   }
}