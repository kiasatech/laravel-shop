<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::all();
        return view('admin.comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        return view('admin.comments.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        return view('admin.comments.create', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $this->validate($request, [
            'contents' => ['required'],
            'status' => ['required'],
        ]);

        $comment->update([
            'content' => $request->contents,
            'status' => $request->status
        ]);

        session()->flash('success', 'نظر با موفقیت ویرایش شد');
        return redirect(route('comments.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        session()->flash('success', 'نظر با موفقیت حذف شد');
        return redirect(route('comments.index'));
    }

    public function reply(Request $request, Comment $comment)
    {
        $this->validate($request, [
            'contents' => ['required']
        ]);

        Comment::create([
            'user_id' => auth()->user()->id,
            'product_id' => $comment->product_id,
            'content' => $request->contents,
            'child' => $comment->id,
            'status' => 1
        ]);

        session()->flash('success', 'پاسخ مورد نظر با موفقیت ثبت شد');
        return redirect(route('comments.index'));
    }
}
