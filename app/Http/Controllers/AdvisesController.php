<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

/*
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

class AdvisesController extends Controller
{
  public function index()
  {
    $services = \App\Service::where('status', 'ACTIVE')->paginate(6);
    if ($services == null) {
      return redirect()->route('home');
    }
    $pageMeta = [
      'title' => 'Tư vấn',
    ];
    return view(('frontend.advises.index'), [
      'services' => $services,
      'pageMeta' => $pageMeta,
    ]);
  }

  public function store(Request $request)
  {
      $validated = $request->validate([
        'email' => 'required'
      ]);

    try {
      $alert = [
        "type" => "success",
        "title" => __("Thành công"),
        "body" => __("Cảm ơn bạn đã yêu cầu liên hệ tư vấn, chúng tôi sẽ sớm phản hồi cho bạn!")
      ];

      $feedback = new \App\Advise();
      $feedback->name = $request->lname.' '.$request->fname;
      $feedback->phone = $request->phone ?? '';
      $feedback->content = $request->body ?? '';
      $feedback->email = $request->email ?? '';
      $feedback->service = $request->service ?? '';
      $feedback->save();
    } catch (\Exception $e) {
      $alert = [
        "type" => "error",
        "title" => __("Không thành công"),
        "body" => __("Có lỗi đã xảy ra, vui lòng thử lại!")
      ];
    }
    return redirect()->back()->with('alert', $alert);
  }
}
