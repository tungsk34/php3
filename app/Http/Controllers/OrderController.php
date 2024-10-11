<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // Lấy danh sách đơn hàng từ cơ sở dữ liệu (giả định)
        $orders = [
            ['id' => 1, 'customer' => 'John Doe', 'total' => 100],
            ['id' => 2, 'customer' => 'Jane Doe', 'total' => 150]
        ];

        // Trả về view danh sách đơn hàng
        return view('orders.index', compact('orders'));
    }
}
