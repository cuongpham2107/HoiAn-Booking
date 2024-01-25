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

class ContactController extends Controller
{
    public function index()
    {
      $pageMeta = [
        'title' => 'Liên hệ',
        'description' => 'Bạn đang quan tâm về những dịch vụ của Hằng Nga Media. Liên hệ ngay với chúng tôi để được tư vấn miễn phí.!

',
      ];
      $contactBanners = \App\Banner::where('status','ACTIVE')->where('type','CONTACT BANNER')->get();
      return view(('frontend.contact.index'), compact([
        'pageMeta',
        'contactBanners'
      ]));
    }
}
