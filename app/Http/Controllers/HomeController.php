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
            // if (condition) {
            //     Redirect::intended('cartpage');
            // }
            return redirect()->route('homepage');
            // $this->showLoginForm();
        }
        
    }
    // public function showLoginForm(){
    //     $previousURL = url()->previous();
    //     $baseURL = url()->to('/');

    //     if($previousURL != $baseURL.'/login'){
    //         session()->put('url.intended',$previousURL);
    //     }
    //     // return view('auth.login');
    //     return redirect()->route('login');
    // }
}