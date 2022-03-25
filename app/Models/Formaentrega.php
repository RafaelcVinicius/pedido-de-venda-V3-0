<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formaentrega extends Model
{
    use HasFactory;

    protected $table = 'formaentrega';
    protected $primarykey = 'id';
    public $timestamps = true;

}
