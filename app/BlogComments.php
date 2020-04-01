<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blogcomments extends Model
{
    protected $table = 'blog_comments';

    protected $primaryKey = 'id';

    public function blogs()
    {
        return $this->belongsTo("App\Blogs", 'id_blogs', 'id');
    }
}