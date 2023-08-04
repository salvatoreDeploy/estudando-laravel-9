<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){

        $users = User::get();

        return view('users.index', compact('users'));
    }

    public function show($id){
      // $user = User::where('id', '=', $id)->first(); Usando o metodo first()

     if(!$user = User::find($id)){
       // return redirect()->back();
       // return back();
       // return redirect()->route('users.index');
       return view('users.error404');
     }

     return view('users.show', compact('user'));
    }
}
