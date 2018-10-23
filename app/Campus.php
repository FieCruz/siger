<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    protected $fillable = [
        'descricao',
        'endereco',
        'telefone',
        'cidade',
      ];

      protected $table ='campus';


      public function campus()
    {
        return $this->hasOne('App\Cidades', 'id', 'cidade');
    }




}
