<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipamentos extends Model
{
    protected $fillable = [
        'eqdescricao',
        'marca',
	    'codidentificacao',
	    'dt_aquisicao',
	    'fkcampus'
    ];
    protected $table ='equipamentos';

    public function equipamentos()
    {
        return $this->hasOne('App\Campus', 'id', 'fkcampus');

    }





}
