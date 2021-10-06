<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Convenio extends Model
{
    protected $fillable = [
        'nome_conv',
        'fone_conv',
        'site_conv',
        'contato_conv',
        'perccons_conv',
        'percexame_conv'
    ];
}
