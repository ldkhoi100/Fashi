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
        return $this->belongsTo("App\Categories", 'id_categories', 'id')->withTrashed();
    }

    public function bill_detail()
    {
        return $this->hasMany("App\Bill_detail", 'id_product', 'id')->withTrashed();
    }

    public function reviews()
    {
        return $this->hasMany("App\Reviews", 'id_products', 'id');
    }

    public function size()
    {
        return $this->belongsToMany(Size::class, 'size_products', 'id_products', 'id_size');
    }

    public function size_product()
    {
        return $this->hasMany("App\Size_products", 'id_products', 'id');
    }
}