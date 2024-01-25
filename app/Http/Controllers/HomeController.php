<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/*
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

class HomeController extends Controller
{
    public function index()
    {
        $homeBanners = \App\Banner::where('status', 'ACTIVE')->where('type','HOME BANNER')->get();
        $counterBanner = \App\Banner::where('status', 'ACTIVE')->where('type','COUNTER BANNER')->first();
        $video_homepage = \App\Banner::where('status', 'ACTIVE')->where('type','VIDEO BANNER')->first();
        $tourProminents = \App\Tour::where('prominent',1)->orderBy('created_at', 'desc')->limit(3)->get();
        foreach($tourProminents as $tour){
            $bookTours = \App\BookTour::where('tour_id',$tour->id)->get();
            $tour->amountPackage = \App\Http\Controllers\TourController::getAmountPackageTour($bookTours);
            $tour->rangePrice = \App\Http\Controllers\TourController::getRangePriceOfTour($bookTours);
        }
        $hotelSpecials = \App\Hotel::where('special',1)->orderBy('created_at', 'desc')->limit(2)->get();
        $posts = \TCG\Voyager\Models\Post::where('featured', 1)->where('status', 'PUBLISHED')->orderBy('created_at', 'asc')->limit(3)->get();
        $static_icons = \App\StaticIcon::all();
        $questions = \App\Question::orderBy('created_at','desc')->limit(4)->get();
        foreach($posts as $post){
            $post_tag_belog = \App\PostTagBelog::where('post_id',$post->id)->get();
            $post_tag_id = array_map(function($item) {
                return $item['post_tag_id'];
            }, $post_tag_belog->toArray());
            $post_tags = \App\PostTag::whereIn('id',$post_tag_id)->get()->toArray();
            $post->post_tags = $post_tags;
        }
        return view(('frontend.homepage.index'), [
            'homeBanners' => $homeBanners,
            'counterBanner' => $counterBanner,
            'video_homepage' => $video_homepage,
            'tourProminents' => $tourProminents,
            'hotelSpecials' => $hotelSpecials,
            'posts' => $posts,
            'static_icons' => $static_icons,
            'questions' => $questions
        ],);
    }
    
}
