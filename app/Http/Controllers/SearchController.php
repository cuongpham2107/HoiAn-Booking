<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $key_form = $request->key;
        dd($key_form);
        $book = \App\Book::where('phone', '=', $key_form)->orderBy('created_at', 'asc')->get();
        // dd($book);
        return view('frontend.search.index', [
            'book' => $book,

        ]);
    }

    public function searchPostsByTagName($slug)
    {
        $tag = \App\PostTag::where('slug',$slug)->first();
        $posts = collect([]);
        foreach($tag->post_tag_belogs as $item){
            $posts->push($item->post);
        }
        $popularPosts = \TCG\Voyager\Models\Post::where('status', 'PUBLISHED')->orderBy('created_at','desc')->limit(4)->get();
        // $categories = \TCG\Voyager\Models\Category::with('posts')->get();
        $tags = \App\PostTag::limit(8)->get();
        $postBanners = \App\Banner::where('status','ACTIVE')->where('type','POSTS BANNER')->get();
        $pageMeta = [
            'title' => 'Tin tức',
            'description' => 'Hằng Nga Media cam kết xây dựng kế hoạch phát triển và duy trì hiệu quả về marketing. Tạo tiền đề vững chắc cho việc phát triển thương hiệu và tạo ra doanh thu bền vững cho doanh nghiệp.',
        ];
        $posts = \App\Http\Controllers\PostController::getPostTagsForCollection($posts);
        $popularPosts = \App\Http\Controllers\PostController::getPostTagsForCollection($popularPosts);
        $posts = $posts->filter(function ($item) {
            return $item !== null;
        });
        return view(('frontend.blogs.index'), compact('posts', 'pageMeta', 'tags','postBanners','popularPosts'));
    }

    public function searchTours(Request $request){
        $tours = \App\Tour::where('name','like','%' . $request->keyword . '%')->paginate(9)->appends($request->all());
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
    public function searchHotels(Request $request){
        $hotelBanners = \App\Banner::where('status','ACTIVE')->where('type','HOTELS BANNER')->get();
        $hotels = \App\Hotel::where('name','like','%' . $request->keyword . '%')->orWhere('short_desc','like','%' . $request->keyword . '%')->paginate(8)->appends($request->all());
        $hotelProminents = \App\Hotel::orderBy('rating','desc')->limit(6)->get();
        $tourRecommend = \App\Tour::limit(6)->get();
        return view('frontend.hotels.index',compact('hotels','hotelBanners','hotelProminents','tourRecommend'));
    }

    public function searchEvents(Request $request){
        $eventBanners = \App\Banner::where('status','ACTIVE')->where('type','EVENTS BANNER')->get();
        $events = \App\Event::where('name','like','%' . $request->keyword . '%')->orWhere('excerpt','like','%' . $request->keyword . '%')->orderBy('created_at','desc')->paginate(6)->appends($request->all());
        return view('frontend.events.index',compact('eventBanners', 'events'));
    }

    public function searchPosts(Request $request){
        $posts = \TCG\Voyager\Models\Post::where('status', 'PUBLISHED')->where('title','like','%' . $request->keyword . '%')->orWhere('excerpt','like','%' . $request->keyword . '%')->paginate(4);
        $recentPost = \TCG\Voyager\Models\Post::where('status', 'PUBLISHED')->where('featured', 1)->orderBy('created_at','desc')->limit(1)->get();
        $popularPosts = \TCG\Voyager\Models\Post::where('status', 'PUBLISHED')->orderBy('created_at','desc')->limit(4)->get();
        // $categories = \TCG\Voyager\Models\Category::with('posts')->get();
        $tags = \App\PostTag::limit(8)->get();
        $postBanners = \App\Banner::where('status','ACTIVE')->where('type','POSTS BANNER')->get();
        $pageMeta = [
            'title' => 'Tin tức',
            'description' => '',
        ];
        $posts = \App\Http\Controllers\PostController::getPostTagsForCollection($posts);
        $recentPost = \App\Http\Controllers\PostController::getPostTagsForCollection($recentPost);
        $popularPosts = \App\Http\Controllers\PostController::getPostTagsForCollection($popularPosts);
        return view(('frontend.blogs.index'), compact('posts', 'recentPost', 'pageMeta', 'tags','postBanners','popularPosts'));
    }
}
