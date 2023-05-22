<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\createRequestProduct;
use App\Http\Requests\Admin\Product\updateRequestProduct;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('parent_id', '>', 0)->get();
        return view('admin.products.create')
            ->with('categories', $categories);
    }

    public function slug($title)
    {
        $explode = explode(' ', $title);
        return $implode = implode('-', $explode);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createRequestProduct $request)
    {
        Product::create([
            'category_id' => $request->category_id,
            'user_id' => auth()->user()->id,
            'title_fa' => $request->title_fa,
            'title_en' => $request->title_en,
            'slug' => $this->slug($request->title_fa),
            'desc' => $request->desc,
            'price' => $request->price,
            'image' => $request->image->store('products'),
            'brand' => $request->brand,
            'seller' => $request->seller,
            'garanty' => $request->garanty,
            'options' => $request->options
        ]);

        session()->flash('success', 'محصول با موفقیت ثبت شد');
        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::where('parent_id', '>', 0)->get();
        return view('admin.products.create', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateRequestProduct $request, Product $product)
    {
        $product->update([
            'category_id' => $request->category_id,
            'title_fa' => $request->title_fa,
            'title_en' => $request->title_en,
            'slug' => $this->slug($request->title_fa),
            'desc' => $request->desc,
            'price' => $request->price,
            'brand' => $request->brand,
            'seller' => $request->seller,
            'garanty' => $request->garanty,
            'options' => $request->options
        ]);
        if ($request->hasFile('image')){
            Storage::delete($product->image);
            $product->image = $request->image->store('products');
            $product->save();
        }

        session()->flash('success', 'محصول با موفقیت ویرایش شد');
        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Storage::delete($product->image);
        $product->delete();

        session()->flash('success', 'محصول با موفقیت حذف شد');
        return redirect(route('products.index'));
    }
}
