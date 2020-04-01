<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Instagrams extends Model
{
    use SoftDeletes;

    protected $table = 'instagrams';

    protected $primaryKey = 'id';

    protected $dates = ['deleted_at'];

    protected $fillable = ['user_deleted'];
}