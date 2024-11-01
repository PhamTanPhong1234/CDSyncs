<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response; 

class ProductController extends Controller
{
    public function index() 
    {
        $sanPhams = Product::all();
        return response()->json(['san_phams' => $sanPhams]);
    }

    public function show($id) 
    {
        $sanPham = Product::find($id);
        if (!$sanPham) {
            return response()->json(['message' => 'Không tìm thấy sản phẩm'], Response::HTTP_NOT_FOUND);
        }
        return response()->json(['san_pham' => $sanPham]);
    }

    public function store(Request $request) 
    {
        $sanPham = Product::create($request->all()); 
        return response()->json($sanPham, Response::HTTP_CREATED);
    }

    public function update(Request $request, $id) 
    {
        $sanPham = Product::find($id);
        if (!$sanPham) {
            return response()->json(['message' => 'Không tìm thấy sản phẩm'], Response::HTTP_NOT_FOUND);
        }
        $sanPham->update($request->all());
        return response()->json($sanPham, Response::HTTP_OK);
    }

    public function destroy($id) 
    {
        $sanPham = Product::find($id); 
        if (!$sanPham) {
            return response()->json(['message' => 'Không tìm thấy sản phẩm'], Response::HTTP_NOT_FOUND);
        }
        $sanPham->delete(); 
        return response()->json(['message' => 'Xóa sản phẩm thành công'], Response::HTTP_NO_CONTENT);
    }
}
