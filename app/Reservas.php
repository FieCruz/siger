<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Equipamentos;

class Reservas extends Model
{
    protected $fillable = [
        'fkequipamentos',
        'solicitante',
        'dtagendamento',
        'dtentrega',
        'obs',

    ];
    /**
     * @var string
     */
    protected $table ='reservas';

        public function equipamentos()
        {
            return $this->hasOne('App\Equipamentos', 'id', 'fkequipamentos');
        }

}