<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    // Lấy danh sách tất cả các mục đơn hàng
    public function index()
    {
        $orderItems = OrderItem::all();
        return response()->json($orderItems, 200);
    }

    // Tạo mục đơn hàng mới
    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:cdsyncs_orders,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric',
        ]);

        $orderItem = OrderItem::create($request->all());

        return response()->json($orderItem, 201);
    }

    // Hiển thị thông tin chi tiết của một mục đơn hàng
    public function show($id)
    {
        $orderItem = OrderItem::findOrFail($id);
        return response()->json($orderItem, 200);
    }

    // Cập nhật mục đơn hàng
    public function update(Request $request, $id)
    {
        $orderItem = OrderItem::findOrFail($id);

        $request->validate([
            'quantity' => 'sometimes|integer|min:1',
            'price' => 'sometimes|numeric',
        ]);

        $orderItem->update($request->only(['quantity', 'price']));

        return response()->json($orderItem, 200);
    }

    // Xóa mục đơn hàng
    public function destroy($id)
    {
        $orderItem = OrderItem::findOrFail($id);
        $orderItem->delete();

        return response()->json(['message' => 'Order item deleted successfully'], 200);
    }
}

