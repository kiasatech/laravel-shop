<?php

namespace App\Http\Controllers;

//use Darryldecode\Cart\Cart;
use App\Models\Order;
use App\Pay\zarinpal;
use Illuminate\Http\Request;

class CartsController extends Controller
{
    public function store(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => [
                'image' => $request->image,
                'garanty' => $request->garanty,
                'seller' => $request->seller,
                'slug' => $request->slug
            ]
        ]);

        session()->flash('success', 'محصول به سبد خرید شما اضافه شد');
        return redirect(route('home.cart'));
    }

    public function updateCart(Request $request)
    {
//        dd($request->all());
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ]
            ]
        );

        session()->flash('success', 'تعداد محصول مورد نظر تغییر پیدا کرد');
        return redirect(route('home.cart'));
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);

        session()->flash('success', 'محصول مورد نظر از سبد حذف شد');
        return redirect(route('home.cart'));
    }

    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'تمام محصولات از سبد خرید شما حذف شدند');
        return redirect(route('home.cart'));
    }

    public function request()
    {
        $MerchantID 	= "xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx";
        $Amount 		= session()->get('total');
        $Description 	= "فروشگاه اینترنتی ماندورا - فروش انواع لوازم هوشمند و الکترونیکی";
        $Email 			= auth()->user()->email;  // Get the user email
        $Mobile 		= "";
        $CallbackURL 	= url('callback/pay');
        $ZarinGate 		= false;
        $SandBox 		= true;

        $zp 	= new zarinpal();
        $result = $zp->request($MerchantID, $Amount, $Description, $Email, $Mobile, $CallbackURL, $SandBox, $ZarinGate);

        if (isset($result["Status"]) && $result["Status"] == 100)
        {
            // Success and redirect to pay
            $zp->redirect($result["StartPay"]);
        } else {
            // error
            echo "خطا در ایجاد تراکنش";
        }
    }

    public function verify()
    {
        $MerchantID 	= "xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx";
        $Amount 		= session()->get('total');
        $ZarinGate 		= false;
        $SandBox 		= true;

        $zp 	= new zarinpal();
        $result = $zp->verify($MerchantID, $Amount, $SandBox, $ZarinGate);

        if (isset($result["Status"]) && $result["Status"] == 100)
        {
            // Success
            foreach (\Cart::getContent() as $item) {
                Order::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $item->id,
                    'price' => $item->price,
                    'quantity' => $item->quantity
                ]);
            }
            \Cart::clear();
            session()->flash('success', 'تراکنش با موفقیت انجام شد :)');
            return redirect(route('home.cart'));
        } else {
            // error
            session()->flash('unSuccess', 'پرداخت شما ناموفق بود :(');
            return redirect(route('home.cart'));
        }
    }
}
