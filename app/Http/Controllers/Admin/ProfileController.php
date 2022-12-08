<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function edit($id){

    $id = Auth::user()->id;
    $user = User::find($id);
    return view('admin.profile.edit', compact('user'));
    }
}