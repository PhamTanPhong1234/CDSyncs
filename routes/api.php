<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Api\Admin\UserController
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::prefix('/users')->group(function () {
    // Tạo route trong đây cho dễ quản lý nghe
    Route::get('/', [App\Http\Controllers\Api\Admin\UserController::class, 'index']); // Lấy danh sách người dùng
    Route::post('/', [App\Http\Controllers\Api\Admin\UserController::class, 'store']); // Tạo người dùng mới
    Route::get('/edit/{id}', [App\Http\Controllers\Api\Admin\UserController::class, 'edit']); // Lấy thông tin một người dùng hiển thị để sửa
    Route::get('/{id}', [App\Http\Controllers\Api\Admin\UserController::class, 'show']); // Lấy thông tin một người dùng cụ thể
    Route::put('/{id}', [App\Http\Controllers\Api\Admin\UserController::class, 'update']); // Cập nhật thông tin người dùng
    Route::delete('/{id}', [App\Http\Controllers\Api\Admin\UserController::class, 'destroy']);
});
