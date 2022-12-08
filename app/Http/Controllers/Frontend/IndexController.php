<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $products = Product::where('status', 1)->orderBy('id', 'DESC')->get();

        $featured = Product::where('featured', 1)->limit(6)->orderBy('id', 'DESC')->get();
        $hot_deals = Product::where('hot_deals', 1)->where('discount_price', '!=', Null)->limit(3)->orderBy('id', 'DESC')->get();
        $special_offer = Product::where('special_offer', 1)->limit(3)->orderBy('id', 'DESC')->get();

        return view('user.home', compact('categories', 'products', 'featured', 'hot_deals', 'special_offer'));
    }

    public function ProductDetails($id, $slug)
    {
        $product = Product::findOrFail($id);

        $color_en = $product->product_color_en;
        $product_color_en = explode(',', $color_en);

        $color_cn = $product->product_color_cn;
        $product_color_cn = explode(',', $color_cn);

        $size_en = $product->product_size_en;
        $product_size_en = explode(',', $size_en);

        $size_cn = $product->product_size_cn;
        $product_size_cn = explode(',', $size_cn);

        $multiImage = MultiImg::where('product_id', $id)->get();

        $cat_id = $product->category_id;
        $relatedProduct = Product::where('category_id',  $cat_id)->where('id', '!=', $id)->orderBy('id', 'DESC')->get();
        return view('user.product_details', compact(
            'product',
            'multiImage',
            'product_color_en',
            'product_color_cn',
            'product_size_en',
            'product_size_cn',
            'relatedProduct'

        ));
    }

    public function ProductViewAjax($id)
    {

        $product = Product::with('category', 'brand')->findOrFail($id);
/*
        $multiImage = MultiImg::where('product_id', $id)->get(); */
        $color = $product->product_color;
        $product_color = explode(',', $color);

        $size = $product->product_size;
        $product_size = explode(',', $size);

        return response()->json(array(
/*             'multiImage' => $multiImage,
 */            'product' => $product,
            'color' => $product_color,
            'size' =>  $product_size,
        ));
    }


}