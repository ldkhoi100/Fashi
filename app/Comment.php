<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;

class Comment extends Model
{
    use Commentable;
    protected $table = 'comments';

    protected $primaryKey = 'id';

    public function blog()
    {
        return $this->belongsTo("App\Blogs", 'commentable_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo("App\User", 'commenter_id', 'id');
    }
}