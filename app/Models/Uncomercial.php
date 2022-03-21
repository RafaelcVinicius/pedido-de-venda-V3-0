<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uncomercial extends Model
{
    use HasFactory;

    protected $table = 'uncomercial';
    protected $primarykey = 'id';
    public $timestamps = true;
}
