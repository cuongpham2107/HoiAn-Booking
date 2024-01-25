<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class BookingHotelItem extends Model
{
    /**
   * The attributes that aren't mass assignable.
   *
   * @var array
   */
  protected $guarded = [];
  /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'booking_hotel_item';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';
     /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;
    /**
     * The data type of the auto-incrementing ID.
     *
     * @var integer
     */
    protected $keyType = 'integer';
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
    
    public function hotel() {
        return $this->belongsTo(\App\Hotel::class,'hotel_id','id');
    }
}
