<?php

namespace App;
use App\Category;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use Sluggable;

    protected $fillable=[
        'name','user_id','content','image',
    ];

    protected $attributes=[
        'status'=>0,
        'hit'=>27,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function sluggable()
    {
        return [
            'slug'=>[
                'source'=>'name',
            ]
        ];
    }
}
