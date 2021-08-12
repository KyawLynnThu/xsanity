<?php

namespace App\Http\Controllers;

use App\Item;
use App\Subcategory;
use App\Comment;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return view('backend.item.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategories = Subcategory::all();
        return view('backend.item.create', compact('subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation
        $request->validate([
            "name" => "required|unique:categories|max:191|min:5",
            "code" => "required",
            "rate" => "required|integer|between: 0,5",
            "photo" => "required|mimes:jpeg,jpg,png",
            "price" => "required",
            "description" => "required",
            "release_year" => "required",
            "subcategory" => "required"
        ]);

        // upload file
        if($request->file()) {
            // 624872374523_a.jpg
            $fileName = time().'_'.$request->photo->getClientOriginalName();

            // categoryimg/624872374523_a.jpg
            $filePath = $request->file('photo')->storeAs('itemimg', $fileName, 'public');
        }

        // data insert
        $item = new Item; // create new object
        $item->name = $request->name;
        $item->codeno = $request->code;
        $item->photo = $filePath;
        $item->rate = $request->rate;
        $item->price = $request->price;
        $item->discount = $request->discount;
        $item->details = $request->detail;
        $item->description = $request->description;
        $item->release_year = $request->release_year;
        $item->subcategory_id = $request->subcategory;
        $item->save();

        // redirect
        return redirect()->route('item.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comments = Comment::where('item_id',$id)->get();

        return view('backend.item.comment',compact('comments'));
    }
    public function showhideComment($id){
        $comment = Comment::findOrFail($id);
        if($comment->status == 'show'){
            $comment->update([
                'status' => 'hide',
            ]);
        }else{
             $comment->update([
                'status' => 'show',
            ]);
        }     
        return back()->with('successMsg','Comment status changed successfully');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $subcategories = Subcategory::all();
        return view('backend.item.edit',compact('subcategories','item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        // validation
       $request->validate([
            "name" => "required|unique:categories|max:191|min:5",
            "code" => "required",
            "rate" => "required|integer|between: 0,5",
            "photo" => "required|mimes:jpeg,jpg,png",
            "price" => "required",
            "description" => "required",
            "release_year" => "required",
            "subcategory" => "required"
        ]);


        // upload file
        if($request->file()) {
            // 624872374523_a.jpg
            $fileName = time().'_'.$request->photo->getClientOriginalName();

            // categoryimg/624872374523_a.jpg
            $filePath = $request->file('photo')->storeAs('itemimg', $fileName, 'public');

            // unlink(public_path().$item->photo);
        }else{
            $filePath = $item->photo;
        }

        // data insert
        $item->name = $request->name;
        $item->codeno = $request->code;
        $item->photo = $filePath;
        $item->rate = $request->rate;
        $item->price = $request->price;
        $item->discount = $request->discount;
        $item->details = $request->detail;
        $item->description = $request->description;
        $item->release_year = $request->release_year;
        $item->subcategory_id = $request->subcategory;
        $item->save();

        // redirect
        return redirect()->route('item.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();

        // redirect
        return redirect()->route('item.index');
    }
}
