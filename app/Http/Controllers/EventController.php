<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    //
    public function index(){
        $eventBanners = \App\Banner::where('status','ACTIVE')->where('type','EVENTS BANNER')->get();
        $events = \App\Event::orderBy('created_at','desc')->paginate(6);
        return view('frontend.events.index',compact('eventBanners', 'events'));
    }
    public function show($slug){
        $event = \App\Event::where('slug',$slug)->first();
        $eventBanners = \App\Banner::where('type','EVENTS BANNER')->where('status','ACTIVE')->get();
        $otherEvents = \App\Event::orderBy('created_at','desc')->limit(4)->get();
        return view('frontend.events.show',compact('event', 'eventBanners', 'otherEvents'));
    }
}
