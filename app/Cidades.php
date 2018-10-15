<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidades extends Model
{
    protected $fillable = [
        'cidade',
        'idestados',
    ];
    protected $table ='cidades';
}

