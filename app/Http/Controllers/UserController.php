<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Auth;

class UserController extends Controller
{
    public function index()
    {
        

        // $users = DB::table('users')
        //         ->join('model_has_roles', function ($join) {
        //         $join->on('users.id', '=', 'model_has_roles.model_id')
        //          ->where('model_has_roles.role_id', '=', 1);
        // })
        // ->get();

        $users = User::join('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')
              ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
              ->get(['users.*', 'roles.name as rname']);
      

        return view('backend.user.index',compact('users'));
    }

    public function edit(User $user)
    {
        $roles = Auth::user()->getRoleNames(); // Returns a collection
        $urole = User::join('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')
              ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
              ->where('model_has_roles.model_id', '=', $user->id)
              ->get(['users.*', 'roles.name as rname']);

        if ($roles[0] == 'admin') {
            return view('backend.user.edit',compact('user','urole'));
        }else{
          return view('frontend.useredit',compact('user','urole'));
        }
    }
    public function update(Request $request, User $user)
    {
        $request->validate([
            "name" => "required|max:191|min:5",
        ]);
        
        // data update
        $user->name = $request->name;
        $user->save();

        // redirect
        $roles = Auth::user()->getRoleNames();
        $urole = User::join('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')
              ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
              ->where('model_has_roles.model_id', '=', $user->id)
              ->get(['users.*', 'roles.name as rname']);

        if ($roles[0] == 'admin') {
            return view('backend.user.edit',compact('user','urole'));
        }else{
          return view('frontend.useredit',compact('user','urole'));
        }

    }

}
