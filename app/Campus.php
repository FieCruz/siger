<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    protected $fillable = [
        'cidade',
        'estado',
	    'endereco',
	    'telefone',
	    'descdocampus',

    ];
    protected $table ='campus';

    public function estado()
    {
        return $this->hasOne('App\Estados', 'id', 'estados');
    }

    public function cidade()
    {
        return $this->hasOne('App\Cidades', 'id', 'cidade');
    }

   
}
