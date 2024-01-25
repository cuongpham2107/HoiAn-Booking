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

class PriceController extends Controller
{
    public function index()
    {
      $services = \App\Service::where('status', 'ACTIVE')->get();
      $pageMeta = [
        'title' => 'Bảng giá dịch vụ',
        ];
      return view(('frontend.prices.index'), [  
        'services' => $services,  
        'pageMeta' =>  $pageMeta
      ],);
    }
}
