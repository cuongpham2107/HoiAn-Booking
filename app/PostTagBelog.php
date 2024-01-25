<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class PostTagBelog extends Model
{
    protected $table = "post_tag_belog";
    public function post()
    {
        return $this->belongsTo(\TCG\Voyager\Models\Post::class);
    }
    public function post_tag()
    {
        return $this->belongsTo(\App\PostTag::class);
    }
}