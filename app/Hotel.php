<?php

namespace App;

use TCG\Voyager\Traits\Resizable;
use Illuminate\Database\Eloquent\Model;


class Hotel extends Model
{
    use Resizable;

    public function rooms(){
        return $this->hasMany('App\RoomType', 'hotel_id');
    }
}
