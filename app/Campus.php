<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    protected $fillable = [
        'id_cidade',
        'idestados',
	    'endereco',
	    'telefone',
	    'descdocampus',

    ];
    protected $table ='campus';

    public function estado()
    {
        return $this->hasOne('App\Estados', 'id', 'idestados');
    }

    public function cidade()
    {
        return $this->hasOne('App\Cidades', 'id', 'id_cidade');
    }

   
}
