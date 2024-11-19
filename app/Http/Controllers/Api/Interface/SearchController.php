<?php

namespace App\Http\Controllers\Api\Interface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artist;
use App\Models\Product;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $query = $request->input('query'); 
        if (!$query) {
            return response()->json(['error' => 'Bạn cần nhập từ khóa tìm kiếm!'], 400);
        }
        $artists = Artist::where('name', 'LIKE', "%$query%")->get();
        $products = Product::where('name', 'LIKE', "%$query%")->get();
        if ($artists->isEmpty() && $products->isEmpty()) {
            return response()->json(['message' => 'Không tìm thấy kết quả phù hợp.'], 404);
        }
        return response()->json([
            'artists' => $artists,
            'products' => $products,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
