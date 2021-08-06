<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Category;
use App\Subcategory;

class PageController extends Controller
{
    public function index(){
    	$categories = Category::all();
    	$subcategories = Subcategory::all();

    	$items = Item::all();
    	return view('frontend.index',compact('categories','subcategories','items'));
    }
    public function detail($id){
    	$categories = Category::all();
    	$subcategories = Subcategory::all();

    	$item = Item::find($id);

    	return view('frontend.detail',compact('categories','subcategories','item'));
    }
    public function all($id){
    	$categories = Category::all();
    	$subcategory = Subcategory::find($id);
    	$subcategories = $subcategory->category->subcategories;

    	$navitem = Item::where('subcategory_id', $id)->get();
    	return view('frontend.all',compact('categories','subcategories','navitem'));
    }
    public function cart(){
    	$categories = Category::all();
    	$subcategories = Subcategory::all();

    	return view('frontend.cart',compact('categories','subcategories'));
    }
    public function login(){
    	$categories = Category::all();
    	$subcategories = Subcategory::all();

    	return view('auth.login',compact('categories','subcategories'));
    }
    public function register(){
    	$categories = Category::all();
    	$subcategories = Subcategory::all();

    	return view('auth.register',compact('categories','subcategories'));
    }
    public function offer(){
    	$categories = Category::all();
    	$subcategories = Subcategory::all();

    	return view('frontend.offer',compact('categories','subcategories'));
    }
    public function contact(){
    	$categories = Category::all();
    	$subcategories = Subcategory::all();

    	return view('frontend.contact',compact('categories','subcategories'));
    }

}
