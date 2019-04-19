<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comida extends Model
{
    use \Staudenmeir\EloquentJsonRelations\HasJsonRelationships;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','price','category'
    ];
    public function pedidos()
    {
        return $this->belongsToJson('App\Pedido', 'id_comidas->id_comida');
    }
}
