<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MessengeUser extends Model
{
    use SoftDeletes;

    protected $table = 'messenge';

    protected $primaryKey = 'id';

    protected $dates = ['deleted_at'];

    public function user1()
    {
        return $this->belongsTo("App\User", 'from_user', 'id');
    }

    public function user2()
    {
        return $this->belongsTo("App\User", 'to_user', 'id');
    }
}