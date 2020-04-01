<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Objects extends Model
{
    use SoftDeletes;

    protected $table = 'objects';

    protected $primaryKey = 'id';

    protected $dates = ['deleted_at'];

    public function products()
    {
        return $this->hasMany("App\Products", 'id_objects', 'id');
    }

    public function blogs()
    {
        return $this->hasMany("App\Blogs", 'id_objects', 'id');
    }

    public function categories()
    {
        return $this->hasMany("App\Categories", 'id_objects', 'id');
    }

    public function slide()
    {
        return $this->hasMany("App\Slide", 'id_objects', 'id');
    }

    public function banners()
    {
        return $this->hasMany("App\Banners", 'id_objects', 'id');
    }
}