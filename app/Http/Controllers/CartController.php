<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function buyer(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('managerCart')->with([
            'buyCart'=>Cart::all()->where('status','>=',1)->sortByDesc('status'),
        ]);
    }
}
