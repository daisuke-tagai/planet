<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'feature_id', 'content', 'title', 'image'
    ];

    public function feature()
    {
        return $this->belongsTo(\App\Feature::class, 'feature_id');
    }

    public function getContentWithLinkAttribute(): string
    {
        $pattern = '/((?:https?|ftp):\/\/[-_.!~*\'()a-zA-Z0-9;\/?:@&=+$,%#]+)/';
        $replace = '<a href="$1">$1</a>';
        return preg_replace($pattern, $replace, $this->content);
    }
}
