<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->except('index', 'show');
    }

    public function index()
    {
        return ProductResource::collection(Product::latest()->with('sub.cat')->paginate());
    }

    public function store(StoreProductRequest $request, Product $product)
    {
        //使用下面的写法不用在$fillable里写'sub_id'了
//        $product->sub_id=$request->sub_id;
        $this->authorize('create', $product);
        $product->fill($request->input())->save();
        return $this->success('产品新增成功', [
            'product' => new ProductResource($product->load('sub.cat'))
        ]);
    }

    public function show(Product $product)
    {

        return $this->success(data:new ProductResource($product->load('sub.cat')));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $this->authorize('update', $product);
        $product->fill($request->input())->save();
        return $this->success('产品修改成功', [
            'product' => new ProductResource($product->load('sub.cat'))
        ]);
    }

    public function destroy(Product $product)
    {
        $this->authorize('delete', $product);
        $product->delete();
        return $this->success('产品删除成功');
    }
}
