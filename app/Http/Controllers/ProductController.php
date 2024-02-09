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
        $path = $request->file('image')->store('/', 'public');
        Product::create([
            'name'=>$request->name,
            'image'=>$path,
            'category_id'=>$request->category,
            'description'=>$request->description,
            'price'=>$request->price,
        ]);
        return redirect()->route('managerProduct');
    }
    public function delete(Product $product): \Illuminate\Http\RedirectResponse
    {
        Storage::disk('public')->delete($product->image);
        $product->delete();
        return redirect()->route('managerProduct');
    }
    public function edit(Product $product, Request $request){
        // обновление имени
        if ($request->has('name')){
            $product->update([
                'name'=>$request->name,
            ]);
        }
        // обновление категории
        if ($request->has('category')){
            $product->update([
                'category_id'=>$request->category,
            ]);
        }
        // обновление описания
        if ($request->has('description')){
            $product->update([
                'description'=>$request->description,
            ]);
        }
        // обновление цены
        if ($request->has('price')){
            $product->update([
                'price'=>$request->price,
            ]);
        }

        // обновление изображения
        if($request->hasFile('image')){
            Storage::disk('public')->delete($product->image);
            $path = $request->file('image')->store('/', 'public');
            $product->update([
                'image'=>$path,
            ]);
        }
        return redirect()->route('managerProduct');
    }
}
