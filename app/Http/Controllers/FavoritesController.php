<?php

namespace App\Http\Controllers;

use App\Models\Favorites;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoritesController extends Controller
{
    public function create(Product $product, Request $request)
    {
        Favorites::create([
            'user_id' => Auth::guard('user')->user()->id,
            'product_id' => $product->id,
        ]);
        return redirect()->route('' . $request->currentRouteName);
    }

    public function delete(Favorites $favorites, Request $request)
    {
        $favorites->delete();
        return redirect()->route('' . $request->currentRouteName);
    }
}
