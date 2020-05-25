<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table = 'purchase'; // a que tabla de la base de datos se hace referencia
    protected $primaryKey = 'id';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'iva', 'shipping', 'total', 'date'
    ];

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }

}
