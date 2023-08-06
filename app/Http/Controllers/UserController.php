<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeUserFormRequest;
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

    public function create(){
        return view('users.create');
    }

    public function store(storeUserFormRequest $request){
        /*
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        */

        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        $user = User::create($data);

        return redirect()->route('users.show', $user->id);
    }

    public function edit($id){
        if(!$user = User::find($id)){

            return view('users.error403');
          }

        return view('users.edit', compact('user'));
    }


    public function update(Request $request,$id){
        if(!$user = User::find($id)){

            return view('users.error403');
          }

        // return view('users.edit', compact('user'));

        dd($request->all());
    }
}
