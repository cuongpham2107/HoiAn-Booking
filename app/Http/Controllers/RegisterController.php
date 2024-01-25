<?php

namespace App\Http\Controllers;
use Cart;
use Illuminate\Support\Facades\Mail;

/*
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Http\Request;

class RegisterController extends Controller
{
  public function index()
  {
    $pageMeta = [
      'title' => 'Đặt dịch vụ',
      ];
    return view(('frontend.register.index'),compact('pageMeta'));
  }

  public function show()
  {
    $pageMeta = [
      'title' => 'Đặt dịch vụ',
      ];
    return view(('frontend.register.show'),compact('pageMeta'));
  }

  public function store(Request $request)
  {
    $quick = $request->input('quick', false);

    if (!$quick) {
      $validated = $request->validate([
        'name' => 'required|max:120',
        'phone' => 'required|numeric|min:10'
      ]);
    }

    try {
      $alert = [
        "type" => "success",
        "title" => __("Thành công"),
        "body" => __("Cảm ơn bạn đã đặt phòng, chúng tôi sẽ sớm phản hồi cho bạn!")
      ];

      $feedback = new \App\Book();
      $feedback->name = $request->name;
      $feedback->phone = $request->phone;
      $feedback->address1 = $request->address1;
      $feedback->address2 = $request->address2;
      $feedback->date = $request->date;
      $feedback->hour = $request->hour;
      $feedback->content = $request->content;
      $feedback->services = $request->services;
      $feedback->subtotal = $request->subtotal;
      $feedback->status = $request->status;

        // dd($feedback);
      $feedback->save();
    } catch (\Exception $e) {
      $alert = [
        "type" => "error",
        "title" => __("Không thành công"),
        "body" => __("Có lỗi đã xảy ra, vui lòng thử lại!")
      ];
    }
    Cart::destroy();

    $name = 'Bệnh viện điện máy 2T';
      Mail::send('frontend.contact.mail', compact('name'), function($email){
        $email->to('haitrang1303@gmail.com', 'Bệnh viện điện máy 2T');
      });
    return view(('frontend.register.success'), compact('feedback'))->with('alert', $alert);
  }
}
