<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Bạn có thể trả về view admin dashboard hoặc quản lý chung
        return view('admin.dashboard');
    }
}
