<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;


class PromotionController extends Controller
{
    // Lấy tất cả các chương trình khuyến mãi
    public function index()
    {
        return Promotion::all();
    }

    // Tạo mới chương trình khuyến mãi
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'discount' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $promotion = Promotion::create($data);

        return response()->json($promotion, 201);
    }

    // Xem chi tiết một chương trình khuyến mãi
    public function show($id)
    {
        return Promotion::findOrFail($id);
    }

    // Xóa chương trình khuyến mãi
    public function destroy($id)
    {
        $promotion = Promotion::findOrFail($id);
        $promotion->delete();

        return response()->json(['message' => 'Promotion đã xóa thành công']);
    }
}