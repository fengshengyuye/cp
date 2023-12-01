<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubRequest;
use App\Http\Requests\UpdateSubRequest;
use App\Http\Resources\SubResource;
use App\Models\Sub;

class SubController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->except('index', 'show');
    }

    public function index()
    {
        return SubResource::collection(Sub::latest()->with('cat')->paginate());
    }

    public function store(StoreSubRequest $request, Sub $sub)
    {
        $this->authorize('create',$sub);
        $sub->fill($request->input())->save();
        return $this->success('产品类型添加成功', [
            'sub' => new SubResource($sub->load('cat'))
        ]);
    }

    public function show(Sub $sub)
    {
        return $this->success(data:new SubResource($sub->load('cat')));
    }

    public function update(UpdateSubRequest $request, Sub $sub)
    {
        $this->authorize('update',$sub);
        $sub->fill($request->input())->save();
        return $this->success('产品类型修改成功', [
            'sub' => new SubResource($sub->load('cat'))
        ]);
    }

    public function destroy(Sub $sub)
    {
        $this->authorize('delete',$sub);
        $sub->delete();
        return $this->success('产品类型删除成功');
    }
}
