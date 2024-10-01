<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cor extends Model
{
    use HasFactory;

    protected $table = 'cors';

    protected $fillable = ['nome'];

    public function carros()
    {
        return $this->hasMany(Carro::class, 'cor_id'); // Certifique-se de que 'cor_id' é o campo correto
    }
}

