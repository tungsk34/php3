<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        // Lấy thông tin người dùng hiện tại
        $user = Auth::user();

        // Trả về view hiển thị thông tin cá nhân
        return view('profile.show', compact('user'));
    }
}
