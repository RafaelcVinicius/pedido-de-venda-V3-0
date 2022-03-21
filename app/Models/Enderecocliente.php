<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enderecocliente extends Model
{
    use HasFactory;

    protected $table = 'enderecocliente';
    protected $primarykey = 'id';
    public $timestamps = true;
}
