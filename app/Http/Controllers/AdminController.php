<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function managers(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('adminManager')->with([
            'managers'=>Manager::all(),
        ]);
    }
    public function users(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('adminUsers')->with([
            'users'=>User::all(),
        ]);
    }
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('index');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('adminUsers');
        }
    }
    public function createManager(Request $request){
        $credentials = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if ($credentials) {
            Manager::create(["password" => Hash::make($request->password)] + $request->all());
        }
            return redirect()->route('adminManagers');
    }
    public function deleteManager(Manager $manager)
    {
        $manager->delete();
        return redirect()->route('adminManagers');
    }
}
