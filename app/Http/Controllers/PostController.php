<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

/*
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

class PostController extends Controller
{
    public function index()
    {
        $posts = \TCG\Voyager\Models\Post::where('status', 'PUBLISHED')->paginate(4);
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

    public static function getPostTagsForCollection($posts){
        foreach($posts as $post){
            if(isset($post)){
                $post_tag_belog = \App\PostTagBelog::where('post_id',$post->id)->get();
                $post_tag_id = array_map(function($item) {
                    return $item['post_tag_id'];
                }, $post_tag_belog->toArray());
                $post_tags = \App\PostTag::whereIn('id',$post_tag_id)->get()->toArray();
                $post->post_tags = $post_tags;
            }
        }
        return $posts;
    }
    public static function getPostTags($post){
            $post_tag_belog = \App\PostTagBelog::where('post_id',$post->id)->get();
            $post_tag_id = array_map(function($item) {
                return $item['post_tag_id'];
            }, $post_tag_belog->toArray());
            $post_tags = \App\PostTag::whereIn('id',$post_tag_id)->get()->toArray();
            $post->post_tags = $post_tags;
        return $post;
    }

    public function show($slug)
    {
        $postBanners = \App\Banner::where('type',"POSTS BANNER")->get();
        $post = \TCG\Voyager\Models\Post::where('slug', $slug)->first();
        $popularPosts = \TCG\Voyager\Models\Post::where('status', 'PUBLISHED')->orderBy('created_at','desc')->limit(4)->get();
        $tags = \App\PostTag::limit(8)->get();
        $post = \App\Http\Controllers\PostController::getPostTags($post);
        $popularPosts = \App\Http\Controllers\PostController::getPostTagsForCollection($popularPosts);
        // dd($post);
        return view('frontend.blogs.show', compact('post', 'postBanners', 'popularPosts', 'tags'));
    }


    public function categoryPost($id)
    {
        // $category=  \TCG\Voyager\Models\Category::find($id);
        $posts = \TCG\Voyager\Models\Post::where('category_id', $id)->where('status', 'PUBLISHED')->paginate(8);
        $recentPosts = \TCG\Voyager\Models\Post::where('status', 'PUBLISHED')->where('featured', 1)->limit(3)->get();
        $categories = \TCG\Voyager\Models\Category::with('posts')->get();
        $postBanners = \App\Banner::where('status','ACTIVE')->where('type','POSTS BANNER')->get();
        $popularPosts = \TCG\Voyager\Models\Post::where('status', 'PUBLISHED')->orderBy('created_at','desc')->limit(4)->get();
        $tags = \App\PostTag::limit(16)->get();
        $pageMeta = [
            'title' => 'Tin tức',
            'description' => '',
        ];
        return view(('frontend.blogs.index'), compact('posts', 'recentPosts', 'pageMeta', 'categories', 'tags', 'postBanners', 'popularPosts'));
    }

    public function tagPost(Request $request)
    {
        if (isset($request->tag)) {
            $arrPost = DB::table('post_tag_belog')->where('post_tag_id', $request->tag)->pluck('post_id')->toArray();
            $posts = \TCG\Voyager\Models\Post::whereIn('id', $arrPost)->where('status', 'PUBLISHED')->paginate(8);
        }
        // $posts = \TCG\Voyager\Models\Post::where('status', 'PUBLISHED')->paginate(8);
        $recentPosts = \TCG\Voyager\Models\Post::where('status', 'PUBLISHED')->where('featured', 1)->limit(3)->get();
        $categories = \TCG\Voyager\Models\Category::with('posts')->get();
        $postBanners = \App\Banner::where('status','ACTIVE')->where('type','POSTS BANNER')->get();
        $popularPosts = \TCG\Voyager\Models\Post::where('status', 'PUBLISHED')->orderBy('created_at','desc')->limit(4)->get();
        $tags = \App\PostTag::limit(16)->get();
        $pageMeta = [
            'title' => 'Tin tức',
            'description' => '',
        ];
        return view(('frontend.blogs.index'), compact('posts', 'recentPosts', 'pageMeta', 'categories', 'tags', 'postBanners', 'popularPosts'));
    }
}
