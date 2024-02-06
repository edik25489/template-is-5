<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $path = $request->file('image')->store('category/'.$request->name, 'public');
        Category::create([
            'name'=>$request->name,
            'image'=>$path,
        ]);
        return redirect()->route('managerCategory');
    }
    public function delete(Category $category): \Illuminate\Http\RedirectResponse
    {
        Storage::disk('public')->deleteDirectory('category/'.$category->name);
        $category->delete();
        return redirect()->route('managerCategory');
    }
}
