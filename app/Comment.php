<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=[
        'article_id','content','name','email'
    ];
    protected $attributes =  [
        'status'=>0,
    ];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
