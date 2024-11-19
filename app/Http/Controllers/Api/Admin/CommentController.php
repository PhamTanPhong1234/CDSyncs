<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\NewsComment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class CommentController extends Controller
{
    public function index()
    {
        return response()->json(NewsComment::all(), Response::HTTP_OK);
    }

    // Tạo mới một NewsComment
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'news_id' => 'required|integer',
            'comment' => 'required|string',
        ], [
            'comment.required' => 'Bình luận là bắt buộc.',
            'comment.string' => 'Bình luận phải là một chuỗi ký tự.',
        ]);

        $newsComment = NewsComment::create($validatedData);

        return response()->json($newsComment, Response::HTTP_CREATED);
    }

    // Hiển thị chi tiết một NewsComment theo ID
    public function show($id)
    {
        $newsComment = NewsComment::find($id);

        if (!$newsComment) {
            return response()->json(['message' => 'Comment not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($newsComment, Response::HTTP_OK);
    }

    // Cập nhật một NewsComment theo ID
    public function update(Request $request, $id)
    {
        $newsComment = NewsComment::find($id);

        if (!$newsComment) {
            return response()->json(['message' => 'Comment not found'], Response::HTTP_NOT_FOUND);
        }

        $validatedData = $request->validate([
            'comment' => 'sometimes|required|string',
        ]);

        $newsComment->update($validatedData);

        return response()->json($newsComment, Response::HTTP_OK);
    }

    // Xóa một NewsComment theo ID
    public function destroy($id)
    {
        $newsComment = NewsComment::find($id);

        if (!$newsComment) {
            return response()->json(['message' => 'Có lỗi xảy ra!'], Response::HTTP_NOT_FOUND);
        }

        $newsComment->delete();

        return response()->json(['message' => 'Xóa bình luận thành công'], Response::HTTP_NO_CONTENT);
    }
}
