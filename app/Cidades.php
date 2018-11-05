<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cidades;

class Cidades extends Model
{
    protected $fillable = [
        'state_id',
        'name', 
    ];
    protected $table ='cidades';
    
    public function estado()
    {
        return $this->hasOne('App\Estados', 'id', 'state_id');
    }


}

