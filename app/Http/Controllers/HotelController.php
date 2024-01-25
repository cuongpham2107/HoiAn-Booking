<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HotelController extends Controller
{
    //
    public function index(){
        $hotelBanners = \App\Banner::where('status','ACTIVE')->where('type','HOTELS BANNER')->get();
        $hotels = \App\Hotel::paginate(8);
        $hotelProminents = \App\Hotel::orderBy('rating','desc')->limit(6)->get();
        $tourRecommend = \App\Tour::limit(6)->get();
        return view('frontend.hotels.index',compact('hotels','hotelBanners','hotelProminents','tourRecommend'));
    }
    public function show(string $slug){
        $hotel = \App\Hotel::with('rooms')->where('slug',$slug)->first();
        $hotelBanners = \App\Banner::where('status','ACTIVE')->where('type','HOTELS BANNER')->get();
        $hotel_recommend = \App\Hotel::inRandomOrder()->limit(6)->get();
        return view('frontend.hotels.show',compact('hotel','hotelBanners','hotel_recommend'));
    }
}
