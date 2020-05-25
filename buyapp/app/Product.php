<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products'; // a que tabla de la base de datos se hace referencia
    protected $primaryKey = 'id';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'cantidad', 'stock', 'type','unit_price', 'description', 'city', 'country','foto','provider_id','is_new'
        ];

    //relacion de tablas
    public function provider()
    {
        return $this->belongsTo('App\Provider');
    }

    public function purchase()
    {
        return $this->belongsToMany('App\Purchase');
    }
    public function scopeNombres($query, $nombres) {
        if ($nombres) {
            return $query->where('name','like',"%$nombres%");
        }
    }
    public function scopeTipos($query, $tipo) {
        if ($tipo) {
            return $query->where('type','like',"%$tipo%");
        }
    }
    public function scopePaises($query, $pais) {
        if ($pais) {
            return $query->where('country','like',"%$pais%");
        }
    } public function scopeCiudades($query, $ciudad) {
    if ($ciudad) {
        return $query->where('city','like',"%$ciudad%");
    }
}
}
