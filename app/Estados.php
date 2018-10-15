<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estados extends Model
{
    protected $fillable = [
        'uf',
        'nomeuf',
    ];
    protected $table ='estados';
}
