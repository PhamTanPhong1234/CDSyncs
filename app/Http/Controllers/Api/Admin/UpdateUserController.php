<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User; // Model liên kết với bảng CDSyncs_users
use Illuminate\Support\Facades\Hash;

class UpdateUserController extends Controller
{
    public function updateProfile(Request $request)
    {
        // Xác thực đầu vào
        $request->validate([
            'id' => 'required|exists:CDSyncs_users,id',
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:CDSyncs_users,email,' . $request->id,
            'password' => 'nullable|confirmed|min:8',
        ]);
    
        try {
            // Lấy người dùng cần cập nhật
            $user = User::find($request->id);
    
            // Cập nhật thông tin người dùng
            $user->username = $request->username;
            $user->email = $request->email;
    
            // Nếu có thay đổi mật khẩu, cập nhật mật khẩu
            if ($request->password) {
                $user->password = bcrypt($request->password);
            }
    
            $user->save(); // Lưu thay đổi
    
            return response()->json([
                'success' => true,
                'message' => 'Thông tin người dùng đã được cập nhật thành công!',
                'data' => $user
            ], 200);
        } catch (\Exception $e) {
            // Trả về lỗi nếu có sự cố
            return response()->json([
                'success' => false,
                'message' => 'Đã xảy ra lỗi: ' . $e->getMessage(),
            ], 500);
        }
    }
    
}

