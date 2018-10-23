<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Estados
 * @package App
 */
class Estados extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'uf',
        'nomeuf',
    ];
    /**
     * @var string
     */
    protected $table ='estados';


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cidades()
    {
        return $this->hasMany('App\Cidades', 'idestados', 'id');
    }
    
}
