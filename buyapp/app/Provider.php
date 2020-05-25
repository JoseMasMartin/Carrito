<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $table = 'providers'; // a que tabla de la base de datos se hace referencia
    protected $primaryKey = 'id';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address', 'location', 'phone','email'
    ];
// relacion de uno a muchos
    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
