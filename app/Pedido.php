<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use \Staudenmeir\EloquentJsonRelations\HasJsonRelationships;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dni_usuario','dni_cliente','price','date','is_deliver','id_comidas'
    ];
    protected $casts = [
        'id_comidas' => 'json',
     ];
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function clientes()
    {
        return $this->hasMany(Cliente::class);
    }
}
