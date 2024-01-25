<?php

namespace App\Http\Controllers;

/*
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Redirect;

class ServiceController extends Controller
{
  public function index()
  {
    $services = \App\Service::where('type', 'dich-vu-chinh')->where('status', 'ACTIVE')->orderBy('sort', 'asc')->get();
    if ($services == null) {
      return redirect()->route('home');
    }
    return view(('frontend.service.index'), [
      'services' => $services,
    ]);
  }

  public function show($slug)
  {
    $service = \App\Service::where('slug', $slug)->first();
    $services = \App\Service::where('status', 'ACTIVE')->get();
    // dd( $recentRoom);

    return view('frontend.service.show', compact('service', 'services'));
  }

  public function save_cart(Request $request)
  {
    $productId = $request->id;
    $qty = $request->qty;
    $product_info = \App\Service::where('id', $productId)->get();

    $data['id'] = $product_info[0]->id;
    $data['name'] = $product_info[0]->title;
    $data['qty'] = 1;
    $data['price'] = $product_info[0]->price;
    $data['weight'] = $product_info[0]->id;
    $data['options']['image'] = $product_info[0]->image;

    //  dd($data);
    Cart::add($data);

    //  dd($data);
    // Cart::destroy();
    Redirect::to('/register');
    return view('frontend.register.index');
  }

  public function show_cart(Request $request)
  {
    return view('frontend.register.index');
  }

  public function delete_cart($rowId)
  {
    Cart::remove($rowId);
    return view('frontend.register.index');
  }
}
