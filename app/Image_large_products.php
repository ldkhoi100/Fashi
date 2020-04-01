<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image_large_products extends Model
{
    use SoftDeletes;

    protected $table = 'image_large_products';

    protected $primaryKey = 'id';

    protected $dates = ['deleted_at'];

    protected $fillable = ['user_deleted'];
}