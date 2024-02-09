<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        return view('managerCategory')->with([
            'category'=>Category::all(),
        ]);
    }
    public function create(Request $request): \Illuminate\Http\RedirectResponse
    {
        $path = $request
            ->file('image')
            ->store('/', 'public');
        Category::create([
            'name'=>$request->name,
            'image'=>$path,
        ]);
        return redirect()->route('managerCategory');
    }
    public function delete(Category $category): \Illuminate\Http\RedirectResponse
    {
        Storage::disk('public')->delete($category->image);

        foreach (Product::all()->where('category_id',$category->id) as $item){
            $item->category_id = 1;
            $item->save();
        }
        $category->delete();
        return redirect()->route('managerCategory');
    }
    public function edit(Category $category, Request $request){
        // обновление имени
        if ($request->has('name')){
            $category->update([
                'name'=>$request->name,
            ]);
        }

        // обновление изображения
        if($request->hasFile('image')){
            Storage::disk('public')->delete($category->image);
            $path = $request->file('image')->store('/', 'public');
            $category->update([
                'image'=>$path,
            ]);
        }
        return redirect()->route('managerCategory');
    }
}
