<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class WebController extends Controller
{
    public function product(Product $product): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('product')->with([
            'product'=>$product,
        ]);
    }
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        if (Auth::guard('user')->check()){
            $cart = Auth::guard('user')->user()->cart;
        }
        else{
            $cart = [];
        };
        return view('welcome')->with([
            'product'=>Product::paginate(3),
            'cart'=>$cart,
        ]);
    }
    public function loginUser(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('userLogin');
    }
    public function registerUser(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('userRegister');
    }
    public function loginManager(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('managerLogin');
    }
    public function loginAdmin(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('adminLogin');
    }
}
