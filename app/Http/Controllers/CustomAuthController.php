<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Activity;
use App\Models\Achievement;
use App\Models\Badge;
use Session;
use Hash;

class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials))
        {
            return redirect()->intended('dashboard')->withSuccess('Signed in');
        }
        return redirect()->route('index')->withSuccess('Login details are not valid');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registeration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'password' => Hash::make($request->input('password')) 
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) 
        {
            return redirect()->route('dashboard')->withSuccess('You have signed-in');
        }

        return redirect()->route('index')->withSuccess('You are not allowed to acces');
    }

    public function dashboard()
    {
        if(Auth::check())
        {
            $activity = Activity::where('user_id', auth()->user()->id)->get();
            $achievement = Achievement::where('user_id', auth()->user()->id)->count();
            $badge = Badge::where('user_id', auth()->user()->id)->sum('badge');

            return view('dashboard.dashboard', compact('activity', 'achievement', 'badge'));
        }

        return redirect()->route('index')->withSuccess('You are not allowed to acces');
    }

    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return redirect()->route('index');
    }

    public function premium(Request $request, $id)
    {
        $user = User::find($id)->update(['is_subscription' => 1]);
        
        return redirect()->route('dashboard');
    }

}
