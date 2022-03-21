<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itempedido extends Model
{
    use HasFactory;

    protected $table = 'itempedido';
    protected $primarykey = 'id';
    public $timestamps = true;

    public function produto(){
        return $this->hasOne(Produtos::class, 'id', 'id_produto' );
    }
}
