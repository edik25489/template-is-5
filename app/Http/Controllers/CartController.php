<?php

namespace App\Http\Controllers;

use App\Http\Resources\BuyerResource;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function buyer(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('managerCart')->with([
            'buy'=>Cart::all()->where('status','>',0)->sortBy('status'),
        ]);
    }
    public function create(Product $product, Request $request){
        Cart::create([
            'user_id'=>Auth::guard('user')->user()->id,
            'product_id'=>$product->id,
            'price'=>$product->price,
            'total'=>$product->price,
        ]);
        return redirect()->route(''.$request->currentRouteName);
    }
    public function difCount(Cart $cart, Request $request){
        if ($cart->count == 1) {
            $cart->delete();
        }
        else{
            $cart->count = $cart->count - 1;
            $cart->total = $cart->count * $cart->price;
            $cart->save();
        }
        return redirect()->route(''.$request->currentRouteName);
    }
    public function addCount(Cart $cart, Request $request){
        $cart->count = $cart->count + 1;
        $cart->total = $cart->count * $cart->price;
        $cart->save();
        return redirect()->route(''.$request->currentRouteName);
    }
    public function delete(Cart $cart){
        $cart->delete();
        return redirect()->route('userCart');
    }
    public function buy(Cart $cart){
        $cart->status = 1;
        $cart->save();
        return redirect()->route('userBuy');
    }
    public function confirm(Cart $cart){
        $cart->status = 2;
        $cart->save();
        return redirect()->route('managerBuyer');
    }
    public function failure(Cart $cart){
        $cart->status = 4;
        $cart->save();
        return redirect()->route('managerBuyer');
    }
}
