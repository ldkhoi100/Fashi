<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravelista\Comments\Commentable;


class Blogs extends Model
{
    use SoftDeletes, Commentable;

    protected $table = 'blogs';

    protected $primaryKey = 'id';

    protected $dates = ['deleted_at'];

    protected $fillable = ['user_deleted'];

    //Update datetime to table categories
    protected $touches = ['categories'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var  array
     */
    // protected $casts = [
    //     'is_admin' => 'boolean',
    // ];

    public function categories()
    {
        return $this->belongsTo("App\Categories", 'id_categories', 'id')->withTrashed();
    }

    public function Objects()
    {
        return $this->belongsTo("App\Objects", 'id_objects', 'id');
    }

    public function blogcomments()
    {
        return $this->hasMany(Comment::class, 'commentable_id', 'id');
    }
}