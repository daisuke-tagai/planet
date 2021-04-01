<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = [
        'feature_name', 'image',
    ];

    public function articles()
    {
        return $this->hasMany(\App\Article::class, 'feature_id', 'id');
    }
}
