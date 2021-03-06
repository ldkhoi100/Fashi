<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    protected $table = 'reviews';

    protected $primaryKey = 'id';

    public function products()
    {
        return $this->belongsTo("App\Products", 'id_products', 'id')->withTrashed();
    }

    public function message()
    {
        return $this->hasMany("App\MessageCenter", 'id_review', 'id');
    }
}