<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       

        // if admin -> backend
        $roles = Auth::user()->getRoleNames(); // Returns a collection
        
        if ($roles[0] == 'admin') {
            return redirect()->route('category.index');
        }else{
            return redirect()->route('homepage');
        }
        
    }
}