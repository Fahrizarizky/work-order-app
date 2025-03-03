<?php

namespace App\Http\Controllers;

use App\Models\WorkOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\alert;

class AuthController extends Controller
{
    public function index() {
        return view('login');
    }

    public function login() {
        $credentials = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            request()->session()->regenerate();
 
            alert('You have successfully logged in.');
            return redirect()->intended('dashboard');
        }
 
        return back()->with('message','Incorrect email or password. Please try again.');
    }

    public function logout() {
        Auth::logout();
 
    request()->session()->invalidate();
 
    request()->session()->regenerateToken();
 
    return redirect('/');
    }

    public function dashboard() {
        $pending = WorkOrder::where('status', 'Pending')->get();
        $inprogress = WorkOrder::where('status', 'In Progress')->get();
        $completed = WorkOrder::where('status', 'Completed')->get();
        $canceled = WorkOrder::where('status', 'Canceled')->get();
        return view('dashboard.index', compact('pending', 'inprogress', 'completed', 'canceled'));
    }
    
}
