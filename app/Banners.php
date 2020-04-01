<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banners extends Model
{
    use SoftDeletes;

    protected $table = 'banners';

    protected $primaryKey = 'id';

    protected $dates = ['deleted_at'];

    protected $fillable = ['user_deleted'];

    public function objects()
    {
        return $this->belongsTo("App\Objects", 'id_objects', 'id');
    }
}