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

class ProductController extends Controller
{
    public function index()
    {
        $products = \App\Product::where('status', 'cong_khai')->paginate(12);
        $pageMeta = [
            'title' => 'Sản phẩm',
            'description' => 'Với hơn 6 năm khai phá thị trường Digital Mar-keting. Hằng Nga Media sở hữu đội ngũ nhân sự chất lượng cao, kinh nghiệm thực chiến. Hỗ trợ nghiên cứu phân tích dữ liệu, insight khách hàng để tối ưu một chiến dịch hiệu quả cả về mặt doanh thu lẫn thương hiệu.',
        ];
        return view(('frontend.product.index'), compact('products', 'pageMeta'));
    }

    public function show($slug)
    {

        $product = \App\Product::where('slug', $slug)->first();

        $pageMeta = [
            'title' => $product->title,
            'description' => $product->description,
            'image' => $product->image,
        ];
        return view('frontend.product.detail', compact('product', 'pageMeta'));
    }
}
