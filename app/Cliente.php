<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Cliente extends Authenticatable
{
    use Notifiable;

    protected $guard = 'cliente';
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dni','name','last_name', 'email', 'password','address','phone','question','answer'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     * 
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function pedidos()
    {
        return $this->hasMany(Pedido::class,'dni_cliente','dni');
    }
    
}
