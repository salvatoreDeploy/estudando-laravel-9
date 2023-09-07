<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $comment;
    protected $user;

    public function __construct(Comment $comment, User $user)
    {
        $this->comment = $comment;
        $this->user = $user;
    }

    public function index(Request $request, $userId){

        if(!$user = $this->user->find($userId)){
            return redirect()->back();
        }

        //$comments = $user->userComments()->where('comment', 'LIKE', "%{$request->search}%")->get();

        $comments = $user->searchUserComments(search: $request->search ?? '');


        return view('users.comments.index', compact('user', 'comments'));
    }

    public function create($userId){

        if(!$user = $this->user->find($userId)){
            return redirect()->back();
        }

        return view('users.comments.create', compact('user'));
    }

    public function store(Request $request, $userId){
        if(!$user = $this->user->find($userId)){
            return redirect()->back();
        }

        $user->userComments()->create([
            'comment' => $request->comment,
            'visible' => isset($request->visible)
        ]);

        return redirect()->route('comments.index', $user->id);
    }

    public function edit($userId, $id){
        if(!$comment = $this->comment->find($id)){
            return redirect()->back();
        }

        $user = $comment->user;

        return view('users.comments.edit', compact('user', 'comment'));
    }
}
