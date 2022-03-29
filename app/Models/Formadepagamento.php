<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formadepagamento extends Model
{
    use HasFactory;

    protected $table = 'formadepagamento';
    protected $primarykey = 'id';
    public $timestamps = true;


    public function especie(){
        return $this->hasOne(Especies::class, 'id', 'id_especie');
    }
}
