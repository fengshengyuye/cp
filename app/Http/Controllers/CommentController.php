<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->except(['index', 'show']);
    }

    public function index(Request $request, $type, $id)
    {
        $comments = model($type, $id)->comments()->whereNull('comment_id')->with('replys')->get();
       return $this->success(data:[
           'comments'=>CommentResource::collection($comments)
    ]);
    }


    public function store(StoreCommentRequest $request, $type, $id)
    {
        //这里$type是什么 没有这个模型文件啊
        $model = model($type, $id);
        $data = ['user_id' => Auth::id()] + $request->input();
        if ($request->comment_id) {
            $data['reply_user_id'] = Comment::find($request->comment_id)->user_id;
        }
//topic_id,info_id
        $comment = $model->comments()->create($data);
        return $this->success('评论添加成功',[
            'comment'=>new CommentResource($comment->fresh())
        ]);
    }




    public function destroy(Comment $comment)
    {
        $this->authorize('delete',$comment);
        $comment->delete();
        return $this->success('评论删除成功');
    }
}
