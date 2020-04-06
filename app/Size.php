<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table = 'size';

    protected $primaryKey = 'id';

    public function products()
    {
        return $this->belongsToMany(Products::class, 'size_products', 'id_products', 'id_size');
    }
}