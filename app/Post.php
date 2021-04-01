<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'category_id', 'content', 'title', 'image'
    ];

    public function category(){
        return $this->belongsTo(\App\Category::class,'category_id');
    }

    public function user(){
        return $this->belongsTo(\App\User::class,'user_id');
    }

    public function comments(){
        return $this->hasMany(\App\Comment::class,'post_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany(\App\Tag::class);
    }

    public function getContentWithLinkAttribute(): string
    {
        $pattern = '/((?:https?|ftp):\/\/[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,%#]+)/';
        $replace = '<a href="$1">$1</a>';
        return preg_replace($pattern, $replace, $this->content);
    }
}