<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class PageController extends Controller
{
    public function index(){
    	$items = Item::all();
    	return view('frontend.index',compact('items'));
    }
    public function detail(){
    	return view('frontend.detail');
    }
    public function all(){
    	return view('frontend.all');
    }
    public function cart(){
    	return view('frontend.cart');
    }
    public function login(){
    	return view('frontend.login');
    }
    public function register(){
    	return view('frontend.register');
    }
    public function offer(){
    	return view('frontend.offer');
    }
    public function contact(){
    	return view('frontend.contact');
    }

}
