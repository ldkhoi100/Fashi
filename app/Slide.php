<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slide extends Model
{
    use SoftDeletes;

    protected $table = 'slide';

    protected $primaryKey = 'id';

    protected $dates = ['deleted_at'];

    protected $fillable = ['user_deleted'];

    public function categories()
    {
        return $this->belongsTo("App\Categories", 'id_categories', 'id');
    }

    public function objects()
    {
        return $this->belongsTo("App\Objects", 'id_objects', 'id');
    }
}