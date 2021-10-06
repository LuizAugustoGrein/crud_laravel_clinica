<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $fillable = [
        'paciente_id',
        'medico_id',
        'data',
        'hora'
    ];

    /**
     * criar uma função para estabelecer a associação (relacionamento)
     * entre a classe 'Consulta' e a classe 'Paciente'
    */
    public function paciente() {
        return $this->belongsTo(Paciente::class);
    }

    /**
     * criar uma função para estabelecer a associação (relacionamento)
     * entre a classe 'Consulta' e a classe 'Medico'
    */
    public function medico() {
        return $this->belongsTo(Medico::class);
    }
}
