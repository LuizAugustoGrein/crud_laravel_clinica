<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    protected $fillable = [
        'nome',
        'crm'
    ];

    /**
     * criar uma função para estabelecer a associação (relacionamento)
     * entre a classe 'Médico' e a classe 'Consulta'
     */
    public function consulta() {
        // especificar o tipo de associação
        return $this->hasMany(Consulta::class);
    }

}
