<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function create(Cart $cart){
        History::create([
            'user_id'=>Auth::guard('user')->user()->id,
            'product_id'=>$cart->product_id,
            'price'=>$cart->price,
            'count'=>$cart->count,
            'sum'=>$cart->total,
        ]);
        $cart->status = 3;
        $cart->save();
        return redirect()->route('userBuy');
    }
}
