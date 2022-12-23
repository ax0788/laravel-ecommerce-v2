<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ShipDistrict;
use App\Models\ShipState;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function DistrictGetAjax($division_id)
    {
        $ship_dist = ShipDistrict::where('division_id', $division_id)->orderBy('district_name', 'ASC')->get();
        return json_encode($ship_dist);
    }

    public function StateGetAjax($district_id)
    {
        $ship_state = ShipState::where('district_id', $district_id)->orderBy('state_name', 'ASC')->get();
        return json_encode($ship_state);
    }

    public function CheckoutStore(Request $request)
    {
        $data = array();
        $data['country_id'] = $request->division_id;
        $data['state_id'] = $request->state_id;
        $data['district_id'] = $request->district_id;
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['post_code'] = $request->post_code;
        $data['notes'] = $request->notes;
        $cartTotal = Cart::total();

        if ($request->payment_method == 'stripe') {
            return view('frontend.payment.stripe', compact('data', 'cartTotal'));
        } elseif ($request->payment_method == 'card') {
            return view('frontend.payment.card', compact('data'));
        } else {
            return view('frontend.payment.cash', compact('data', 'cartTotal'));
        }
    }
}