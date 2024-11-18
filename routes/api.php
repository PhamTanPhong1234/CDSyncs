<?php

use App\Http\Controllers\Api\Admin\AlbumController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Admin\OrderController;
use App\Http\Controllers\Api\Admin\OrderItemController;
use App\Http\Controllers\Api\Admin\ProductController;
use App\Http\Controllers\Api\Admin\PostController;
use App\Http\Controllers\Api\Admin\NewsCategoryController;
use App\Http\Controllers\Api\Interface\RegisterController;
use App\Http\Controllers\Api\Interface\LoginController;
use App\Http\Controllers\Api\Interface\ForgotPasswordController;


// use App\Http\Controllers\Api\Admin\UserController
/*
|----------------------------------------------------------------------
| API Routes
|----------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Định nghĩa route để lấy thông tin người dùng đang xác thực
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Nhóm route yêu cầu xác thực
Route::middleware('auth:sanctum')->group(function () {
    // Route cho đơn hàng
    Route::post('/orders', [OrderController::class, 'store']);
    Route::get('/orders', [OrderController::class, 'index']);
    Route::get('/orders/{id}', [OrderController::class, 'show']);
    Route::put('/orders/{id}', [OrderController::class, 'update']);
    Route::delete('/orders/{id}', [OrderController::class, 'destroy']);

    // Route cho các mục đơn hàng
    Route::apiResource('order-items', OrderItemController::class);
});
Route::prefix('/users')->group(function () {
    // Tạo route trong đây cho dễ quản lý nghe
    Route::get('/', [App\Http\Controllers\Api\Admin\UserController::class, 'index']); // Lấy danh sách người dùng
    Route::post('/', [App\Http\Controllers\Api\Admin\UserController::class, 'store']); // Tạo người dùng mới
    Route::get('/edit/{id}', [App\Http\Controllers\Api\Admin\UserController::class, 'edit']); // Lấy thông tin một người dùng hiển thị để sửa
    Route::get('/{id}', [App\Http\Controllers\Api\Admin\UserController::class, 'show']); // Lấy thông tin một người dùng cụ thể
    Route::put('/{id}', [App\Http\Controllers\Api\Admin\UserController::class, 'update']); // Cập nhật thông tin người dùng
    Route::delete('/{id}', [App\Http\Controllers\Api\Admin\UserController::class, 'destroy']);
});

Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('forgot-password', [AuthController::class, 'forgotPassword']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

Route::resource('products', ProductController::class);
Route::resource('news_categories', NewsCategoryController::class);
Route::apiResource('posts', PostController::class);
Route::apiResource('albums', AlbumController::class );





