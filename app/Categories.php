<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
{
    use SoftDeletes;

    protected $table = 'categories';

    protected $primaryKey = 'id';

    protected $dates = ['deleted_at'];

    protected $fillable = ['user_deleted'];

    //Update datetime to table objects
    protected $touches = ['objects'];

    public function blogs()
    {
        return $this->hasMany("App\Blogs", 'id_categories', 'id')->withTrashed();
    }

    public function products()
    {
        return $this->hasMany("App\Products", 'id_categories', 'id')->withTrashed();
    }

    public function objects()
    {
        return $this->belongsTo("App\Objects", 'id_objects', 'id');
    }

    public function slide()
    {
        return $this->hasMany("App\Categories", 'id_categories', 'id');
    }
}