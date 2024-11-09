<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    // Phương thức lấy danh sách bài viết
    public function index()
    {
        $posts = Post::all();
        return response()->json($posts, Response::HTTP_OK);
    }

    // Phương thức tạo bài viết mới
    public function store(Request $request)
    {
        // Validate dữ liệu
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'required|string|max:100',
            'status' => 'in:draft,published'
        ]);

        // Tạo bài viết
        $post = Post::create($validatedData);
        return response()->json($post, Response::HTTP_CREATED);
    }

    // Phương thức xem chi tiết bài viết
    public function show($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json(['message' => 'Post not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($post, Response::HTTP_OK);
    }

    // Phương thức cập nhật bài viết
    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json(['message' => 'Post not found'], Response::HTTP_NOT_FOUND);
        }

        // Validate dữ liệu
        $validatedData = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'content' => 'sometimes|required|string',
            'author' => 'sometimes|required|string|max:100',
            'status' => 'in:draft,published'
        ], [
            'title.required' => 'Tiêu đề là bắt buộc.',
            'title.string' => 'Tiêu đề phải là một chuỗi ký tự.',
            'title.max' => 'Tiêu đề không được vượt quá 255 ký tự.',
            
            'content.required' => 'Nội dung là bắt buộc.',
            'content.string' => 'Nội dung phải là một chuỗi ký tự.',
            
            'author.required' => 'Tác giả là bắt buộc.',
            'author.string' => 'Tác giả phải là một chuỗi ký tự.',
            'author.max' => 'Tên tác giả không được vượt quá 100 ký tự.',
            
            'status.in' => 'Trạng thái chỉ có thể là "draft" hoặc "published".',
        ]);
        

        // Cập nhật bài viết
        $post->update($validatedData);
        return response()->json($post, Response::HTTP_OK);
    }

    // Phương thức xóa bài viết
    public function destroy($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json(['message' => 'Không tìm thấy tin !'], Response::HTTP_NOT_FOUND);
        }

        $post->delete();
        return response()->json(['message' => 'Tin đã được xóa!'], Response::HTTP_OK);
    }
}
