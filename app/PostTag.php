<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class PostTag extends Model
{
     public function post_tag_belogs()
     {
         return $this->hasMany(\App\PostTagBelog::class);
     }
}
