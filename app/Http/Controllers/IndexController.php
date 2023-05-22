<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Poster;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $itemCarts = \Cart::getContent();
        $categories = Category::where('parent_id', 0)->get();
        $sliders = Slider::all();
        $posters = Poster::all();
        $products = Product::searched()->orderBy('id', 'desc')->limit(7)->get();
        $offers = Product::limit(2)->get();
        $randoms = Product::inRandomOrder()->limit(7)->get();
        $bSellers = Product::inRandomOrder()->limit(7)->get();
//        dd($posters[0]->name);
        return view('home.index')
            ->with('categories', $categories)
            ->with('sliders', $sliders)
            ->with('products', $products)
            ->with('offers', $offers)
            ->with('randoms', $randoms)
            ->with('bSellers', $bSellers)
            ->with('posters', $posters)
            ->with('itemCarts' , $itemCarts);
    }

    public function product($slug)
    {
        $itemCarts = \Cart::getContent();
        $product = Product::where('slug', $slug)->first();
        $categories = Category::where('parent_id', 0)->get();
        $similars = Product::where('category_id', $product->category_id)->orderBy('id', 'desc')->limit(7)->get();
        return view('home.product')
            ->with('categories', $categories)
            ->with('product', $product)
            ->with('similars', $similars)
            ->with('itemCarts' , $itemCarts);
    }

    public function category(Category $category)
    {
        $itemCarts = \Cart::getContent();
        $categories = Category::where('parent_id', 0)->get();
        return view('home.category', ['categories' => $categories, 'category' => $category, 'itemCarts' => $itemCarts]);
    }

    public function cart()
    {
        $itemCarts = \Cart::getContent();
        $categories = Category::where('parent_id', 0)->get();
        return view('home.cart', ['categories' => $categories, 'itemCarts' => $itemCarts]);
    }

    public function comment(Request $request, Product $product)
    {
        $this->validate($request, [
            'contents' => ['required', 'min:5']
        ]);

        $comment = Comment::create([
            'user_id' => auth()->user()->id,
            'product_id' => $product->id,
            'content' => $request->contents,
        ]);

        if (auth()->user()->role == 'admin'){
            $comment->status = 1;
            $comment->save();
        }

        session()->flash('success', 'نظر شما ثبت شد بزودی تایید خواهد شد');
        return back();
    }
}
