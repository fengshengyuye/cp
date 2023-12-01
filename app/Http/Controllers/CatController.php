<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCatRequest;
use App\Http\Requests\UpdateCatRequest;
use App\Http\Resources\CatResource;
use App\Models\Cat;

class CatController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->except(['index', 'show']);
    }

    public function index()
    {
        return $this->success(data:CatResource::collection(Cat::orderBy('order', 'asc')->with('subs')->latest()->get()));
    }

    public function store(StoreCatRequest $request, Cat $cat)
    {
        $this->authorize('create', $cat);
        $cat->fill($request->input())->save();
        return $this->success('产品大类添加成功', [
            'cat' => $cat
        ]);
    }

    public function show(Cat $cat)
    {
        $data = new CatResource($cat);
        return $this->success(data:$data->load('subs'));
    }

    public function update(UpdateCatRequest $request, Cat $cat)
    {
        $this->authorize('create', $cat);
        $cat->fill($request->input())->save();
        return $this->success('产品大类修改成功', [
            'cat' => $cat
        ]);
    }

    public function destroy(Cat $cat)
    {
        $this->authorize('delete', $cat);
        $cat->delete();
        return $this->success('产品大类删除成功');
    }
}
