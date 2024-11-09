<?php

namespace App\Http\Controllers;


use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    // Lấy tất cả các voucher
    public function index()
    {
        return Voucher::all();
    }

    // Tạo mới voucher
    public function store(Request $request)
    {
        $data = $request->validate([
            'code' => 'required|string|unique:vouchers,code',
            'discount' => 'required|numeric',
            'usage_limit' => 'required|integer',
            'expiry_date' => 'required|date',
            'is_active' => 'required|boolean',
        ]);

        $voucher = Voucher::create($data);

        return response()->json($voucher, 201);
    }

    // Kiểm tra và sử dụng voucher
    public function redeem($code)
    {
        $voucher = Voucher::where('code', $code)->first();

        if (!$voucher || !$voucher->is_active || $voucher->expiry_date < now() || $voucher->usage_limit <= 0) {
            return response()->json(['message' => 'Voucher không hợp lệ hoặc đã hết hạn'], 400);
        }

        // Giảm số lượng sử dụng
        $voucher->decrement('usage_limit');

        return response()->json(['message' => 'Đã đổi voucher thành công', 'Giảm giá' => $voucher->discount]);
    }
}