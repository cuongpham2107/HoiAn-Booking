<?php

namespace App;
use TCG\Voyager\Traits\Resizable;
use Illuminate\Database\Eloquent\Model;


class Tour extends Model
{  
     use Resizable;
     public function book_tour() {
          return $this->belongsTo(\App\BookTour::class,'id','tour_id');
     }
}
