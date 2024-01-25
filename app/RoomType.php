<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Resizable;

class RoomType extends Model
{
    use Resizable;

    public function hotel(){
        return $this->belongsTo('App\Hotel', 'hotel_id','id');
    }
}
