<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function buyer(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('managerCart')->with([
            'buyCart'=>Cart::all()->where('status','>=',1)->sortByDesc('status'),
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

    }
}
