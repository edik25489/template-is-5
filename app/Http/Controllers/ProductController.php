<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        return view('managerProduct')->with([
            'product'=>Product::paginate(5),
            'category'=>Category::all(),
        ]);
    }
    public function create(Request $request): \Illuminate\Http\RedirectResponse
    {
        $path = $request->file('image')->store('product/'.$request->name, 'public');
        Product::create([
            'name'=>$request->name,
            'image'=>$path,
            'category_id'=>$request->category_id,
            'description'=>$request->description,
            'price'=>$request->price,
        ]);
        return redirect()->route('managerProduct');
    }
    public function delete(Product $product): \Illuminate\Http\RedirectResponse
    {
        Storage::disk('public')->deleteDirectory('product/'.$product->name);
        $product->delete();
        return redirect()->route('managerProduct');
    }
}
