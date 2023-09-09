<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeUserFormRequest;
use App\Http\Requests\updateUserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index(Request $request){

        // $users = User::get();

       // $users = User::where('name', 'LIKE', "%{$request->search}%")->get();

       // $search = $request->search;

       $users = $this->user->getUsers(search: $request->search ?? '');

       return view('users.index', compact('users'));
    }

    public function show($id){
      // $user = User::where('id', '=', $id)->first(); Usando o metodo first()

     if(!$user =  $this->user->find($id)){
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

        // dd($request->file('image'));

        if($request->image){
             $data['image'] = $request->image->store('users');

            /* $extension = $request->image->getClientOriginalExtension();
            $data['image'] = $request->image->storeAs('users', $request->name . ".{$extension}"); */
        }

        $user =  $this->user->create($data);

        return redirect()->route('users.show', $user->id);
    }

    public function edit($id){
        if(!$user =  $this->user->find($id)){

            return view('users.error403');
          }

        return view('users.edit', compact('user'));
    }


    public function update(storeUserFormRequest $request,$id){
        if(!$user =  $this->user->find($id)){

            return view('users.error403');
          }

         /*
          $user->name = $request->name;
          $user->email = $request->get('email');
          $user->save();
          */
          $data = $request->only('name', 'email');

          if($request->password){
            $data['password'] =bcrypt($request->password);
          }

          if($request->image){
            if($user->image && Storage::exists($user->image)){
                Storage::delete($user->image);
            }


            $data['image'] = $request->image->store('users');
       }

          $user->update($data);

         return redirect()->route('users.index');
    }

    public function delete($id){
        if(!$user =  $this->user->find($id)){

            return view('users.error403');
          }

        $user->delete();

        return redirect()->route('users.index');
    }
}
