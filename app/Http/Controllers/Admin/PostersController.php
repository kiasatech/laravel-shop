<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Poster\createRequestPoster;
use App\Http\Requests\Admin\Poster\updateRequestPoster;
use App\Models\Poster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posters = Poster::all();
        return view('admin.posters.index')
            ->with('posters', $posters);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createRequestPoster $request)
    {
        Poster::create([
            'name' => $request->name,
            'url' => $request->url,
            'image' => $request->image->store('posters')
        ]);

        session()->flash('success', 'پوستر با موفقیت اضافه شد');
        return redirect(route('posters.index'));
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
    public function edit(Poster $poster)
    {
        return view('admin.posters.create')->with('poster', $poster);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateRequestPoster $request, Poster $poster)
    {
        $poster->update([
            'name' => $request->name,
            'url' => $request->url
        ]);

        if ($request->hasFile('image')){
            Storage::delete($poster->image);
            $poster->image = $request->image->store('posters');
            $poster->save();
        }

        session()->flash('success', 'پوستر با موفقیت ویرایش شد');
        return redirect(route('posters.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poster $poster)
    {
        Storage::delete($poster->image);
        $poster->delete();
        session()->flash('success', 'پوستر با موفقیت حذف شد');
        return redirect(route('posters.index'));
    }
}
