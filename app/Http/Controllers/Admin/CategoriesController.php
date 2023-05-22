<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\createRequestCategory;
use App\Http\Requests\Admin\Category\updateRequestCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(10);
        return view('admin.categories.index')
            ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('parent_id', 0)->get();
        return view('admin.categories.create')
            ->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createRequestCategory $request)
    {
        Category::create([
            'name' => $request->name,
            'parent_id' => $request->parent_id
        ]);
        session()->flash('success', 'دسته بندی با موفقیت ایجاد شد');
        return redirect(route('categories.index'));
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
    public function edit(Category $category)
    {
        $categories = Category::where('parent_id', 0)->get();
        return view('admin.categories.create')
            ->with('categories', $categories)
            ->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateRequestCategory $request, Category $category)
    {
        $category->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id
        ]);
        session()->flash('success', 'دسته بندی با موفقیت ویرایش شد');
        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->parents()->delete();
        $category->delete();
        session()->flash('success', 'دسته بندی با موفقیت حذف شد');
        return redirect(route('categories.index'));

        /*$category->parents()->delete();
        session()->flash('success', 'دسته بندی با موفقیت حذف شد');
        return redirect(route('categories.index'));*/

        /*if ($category->parents()->count()){
            session()->flash('error', 'دسته بندی دارای زیر منو میباشد، برای حذف دسته بندی ابتدا زیر منو هارا حذف کنید!');
            return redirect(route('categories.index'));
        }else{
            $category->delete();
            session()->flash('success', 'دسته بندی با موفقیت حذف شد');
            return redirect(route('categories.index'));
        }*/
    }
}
