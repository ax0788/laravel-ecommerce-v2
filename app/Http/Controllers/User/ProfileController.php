<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class ProfileController extends Controller
{
    public function index(){

        $id = Auth::user()->id;
        $user = User::find($id);
        return view('user.profile.index', compact('user'));
        }

        public function edit($id){

        $id = Auth::user()->id;
        $user = User::find($id);
         return view('user.profile.edit', compact('user'));
        }

        public function update(Request $request){

        $user = User::find(Auth::user()->id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        $notification = array(
            'message' => 'User Profile Updated Successfully!',
            'alert-type' => 'success'
        );
        $user->save();
        return  redirect()->back()->with($notification);
        }
    }