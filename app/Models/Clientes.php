<?php

namespace App\Models;

use App\Models\Enderecocliente;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Clientes extends Model
{
    use HasFactory;

    protected $table = 'clientes';
    protected $primarykey = 'id';
    public $timestamps = true;

    public function endereco(){
        return $this->hasOne(Enderecocliente::class, 'id_cliente', 'id');

    }
    public static function selectdados(){
         $clientes = Self::select(
            'id as campo1',
            'nome as campo2',
            'cnpjcpf as campo3',
            'telefone as campo4'            
        )->get();
        return $clientes;
    }
}