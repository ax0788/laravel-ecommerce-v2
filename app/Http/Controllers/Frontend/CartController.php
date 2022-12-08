<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\ShipDivison;
use App\Models\Wishlist;

use Gloudemans\Shoppingcart\Facades\Cart as Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class CartController extends Controller
{
    public function AddToCart(Request $request, $id)
    {
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        $product = Product::findOrFail($id);
        if ($product->discount_price == null) {
            Cart::add([
                'id' =>  $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thumbnail,
                    'color' => $request->color,
                    'size' =>  $request->size,
                ]
            ]);
            return response()->json(['success' => 'Successfully Added to Cart']);
        } else {

            Cart::add([
                'id' =>  $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thumbnail,
                    'color' => $request->color,
                    'size' =>  $request->size,
                ]
            ]);
            return response()->json(['success' => 'Successfully Added to Cart']);
        }
    }


}