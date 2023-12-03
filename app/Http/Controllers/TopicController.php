<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTopicRequest;
use App\Http\Requests\UpdateTopicRequest;
use App\Http\Resources\TopicResource;
use App\Models\Topic;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{
public function __construct()
{
    $this->middleware(['auth:sanctum'])->except('index','show');
}

    public function index()
    {
        return TopicResource::collection(Topic::latest()->with('user')->paginate());
    }


    public function store(StoreTopicRequest $request, Topic $topic)
    {
        $topic->fill($request->input());
        $topic->user_id = Auth::id();
        $topic->save();
        return $this->success('帖子发表成功', [
            'topic' => new TopicResource($topic->load('user'))
        ]);
    }

    public function show(Topic $topic)
    {
        return new TopicResource($topic->load('user'));
    }

    public function update(UpdateTopicRequest $request, Topic $topic)
    {
        $this->authorize('update',$topic);
        $topic->fill($request->input())->save();
        return $this->success('帖子修改成功', [
            'topic' => new TopicResource($topic->load('user'))
        ]);
    }


    public function destroy(Topic $topic)
    {
        $this->authorize('delete',$topic);
        $topic->delete();
        return $this->success('帖子删除成功');
    }
}
