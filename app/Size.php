<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table = 'size';

    protected $primaryKey = 'id';

    public $timestamps = false;

    public function products()
    {
        return $this->belongsToMany(Products::class, 'size_products', 'id_products', 'id_size');
    }

    public function size_product()
    {
        return $this->hasMany("App\Size_products", 'id_size', 'id');
    }
}