<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    use HasFactory;

    protected $fillable = ['placa', 'modelo_id', 'estado_id', 'cor_id'];

    public function modelo()
    {
        return $this->belongsTo(Modelo::class);
    }

    public function marca()
    {
        return $this->modelo->marca(); // Ajuste se a relação estiver diferente
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    public function cor()
    {
        return $this->belongsTo(Cor::class);
    }

}
