<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TourController extends Controller
{
    //
    public function index() {
        $tours = \App\Tour::paginate(9);
        $tourBanners = \App\Banner::where('status','ACTIVE')->where('type','TOURS BANNER')->get();
        foreach($tours as $tour){
            $bookTours = \App\BookTour::where('tour_id',$tour->id)->get();
            if($bookTours->isNotEmpty()){
                $tour->amountPackage = \App\Http\Controllers\TourController::getAmountPackageTour($bookTours);
                $tour->rangePrice = \App\Http\Controllers\TourController::getRangePriceOfTour($bookTours);
            }
        }
        return view(('frontend.tours.index'),[
            'tours' => $tours,
            'tourBanners' => $tourBanners
        ]);
    }

    public function show(string $slug){
        $tour = \App\Tour::where('slug',$slug)->first();
        $bookTours = \App\BookTour::where('tour_id',$tour->id)->get();
        if($bookTours->isNotEmpty()){
            $tour->amountPackage = \App\Http\Controllers\TourController::getAmountPackageTour($bookTours);
            $tour->rangePrice = \App\Http\Controllers\TourController::getRangePriceOfTour($bookTours);
            $tour->amountDayTrip = \App\Http\Controllers\TourController::getAmountDayTrip($bookTours);
            $tour->rangeCapacity = \App\Http\Controllers\TourController::getCapacityOfTour($bookTours);
        }
        $tourBanners = \App\Banner::where('status','ACTIVE')->where('type','TOURS BANNER')->get();
        return view('frontend.tours.show',compact('tour','tourBanners'));
    }

    public static function getAmountPackageTour($bookTours){
        return $bookTours->count();
    }

    public static function getRangePriceOfTour($bookTours){
        if($bookTours->min('price') == $bookTours->max('price')){
            $rangePrice = $bookTours->max('price');
        }else{
            $rangePrice = $bookTours->min('price') . ' - ' . $bookTours->max('price');
        }
        return $rangePrice;
    }

    public static function getAmountDayTrip($bookTours){
        $timeOfTour = [];
        foreach($bookTours as $tour){
            $start_date = \Illuminate\Support\Carbon::parse($tour->start_date);
            $end_date = \Illuminate\Support\Carbon::parse($tour->end_date);
            $timeOfTour[] = $start_date->diffInDays($end_date);
        }
        $timeOfTour = collect($timeOfTour);
        if($timeOfTour->min() == $timeOfTour->max()){
            $amountDayTrip = $timeOfTour->max();
        }else{
            $amountDayTrip = $timeOfTour->min() . ' - ' . $timeOfTour->max();
        }
        return $amountDayTrip;
    }

    public static function getCapacityOfTour($bookTours){
        $rangeCapacityOfTour = [];
        foreach($bookTours as $tour){
            $rangeCapacityOfTour[] = $tour->max_capacity;
        }
        $rangeCapacityOfTour = collect($rangeCapacityOfTour);
        if($rangeCapacityOfTour->min() == $rangeCapacityOfTour->max()){
            $capacityOfTour = $rangeCapacityOfTour->max();
        }else{
            $capacityOfTour = $rangeCapacityOfTour->min() . ' - ' . $rangeCapacityOfTour->max();
        }
        return $capacityOfTour;
    }

}
