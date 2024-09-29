<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class Marca extends Model
{

    use HasFactory;
    //use SoftDeletes;

    protected $table = 'marcas';

    // Adicione os campos que podem ser atribuídos em massa
    protected $fillable = ['nome'];

}
