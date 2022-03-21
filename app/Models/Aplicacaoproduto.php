<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aplicacaoproduto extends Model
{
    use HasFactory;

    protected $table = 'aplicacaoproduto';
    protected $primarykey = 'id';
    public $timestamps = true;
}
