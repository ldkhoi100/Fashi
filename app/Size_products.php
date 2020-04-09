<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size_products extends Model
{
    public $table = 'size_products';
    protected $primaryKey = 'id';

    public function products()
    {
        return $this->belongsTo("App\Products", 'id_products', 'id');
    }

    public function size()
    {
        return $this->belongsTo("App\Size", 'id_size', 'id');
    }
}