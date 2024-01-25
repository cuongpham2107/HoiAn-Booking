<?php

namespace App\Http\Controllers;
/*
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $breadcrumb = \App\Banner::where('status', 'ACTIVE')->where('type', 'ABOUT BANNER')->first();
        $about = \TCG\Voyager\Models\Page::where('slug', 'about')->where('status', 'ACTIVE')->first();
        if ($about == null) {
            return redirect()->route('home');
        }
        $pageMeta = [
            'title' => $about->title,
            'meta_description' => $about->meta_description,
            'image' => $about->images,
            'description' => $about->description,
        ];
        return view(('frontend.about.index'), [
            'breadcrumb' => $breadcrumb,
            'about' => $about,
            'pageMeta' => $pageMeta,
        ]);
    }

    public function page($slug)
    {
        $breadcrumb = \App\Banner::where('status', 'ACTIVE')->where('type', 'ABOUT BANNER')->first();
        $about = \TCG\Voyager\Models\Page::where('slug', $slug)->where('status', 'ACTIVE')->first();
        if ($about == null) {
            return redirect()->route('home');
        }
        $pageMeta = [
            'title' => $about->title,
            'meta_description' => $about->meta_description,
            'image' => $about->images,
            'description' => $about->description,
        ];
        return view(('frontend.about.index'), [
            'breadcrumb' => $breadcrumb,
            'about' => $about,
            'pageMeta' => $pageMeta,
        ]);
    }

}
