<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInfoRequest;
use App\Http\Requests\UpdateInfoRequest;
use App\Http\Resources\InfoResource;
use App\Models\Info;

class InfoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->except(['index', 'show']);
    }

    public function index()
    {
        return InfoResource::collection(Info::latest()->paginate());
    }


    public function store(StoreInfoRequest $request, Info $info)
    {
        $this->authorize('create',$info);
        $info->fill($request->input())->save();
        return $this->success('新闻资讯添加成功', [
            'info' => new InfoResource($info)
        ]);
    }

    public function show(Info $info)
    {
        return $this->success(data:new InfoResource($info));
    }

    public function update(UpdateInfoRequest $request, Info $info)
    {
        $this->authorize('update',$info);
        $info->fill($request->input())->save();
        return $this->success('新闻资讯修改成功', [
            'info' => new InfoResource($info)
        ]);
    }

    public function destroy(Info $info)
    {
        $this->authorize('delete',$info);
        $info->delete();
        return $this->success('新闻资讯删除成功');
    }
}
