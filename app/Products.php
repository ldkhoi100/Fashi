<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use SoftDeletes;

    protected $table = 'products';

    protected $primaryKey = 'id';

    protected $dates = ['deleted_at'];

    protected $fillable = ['user_deleted'];

    //Update datetime to table categories
    protected $touches = ['categories'];

    public function objects()
    {
        return $this->belongsTo("App\Objects", 'id_objects', 'id');
    }

    public function categories()
    {
        return $this->belongsTo("App\Categories", 'id_categories', 'id');
    }

    public function bill_detail()
    {
        return $this->hasMany("App\Bill_detail", 'id_product', 'id');
    }

    public function reviews()
    {
        return $this->hasMany("App\Reviews", 'id_products', 'id');
    }
}