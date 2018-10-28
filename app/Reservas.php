<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Equipamentos;
use App\Reservas;

class Reservas extends Model
{
    protected $fillable = [
        'fkequipamentos',
        'solicitante',
        'dtagendamento',
       

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