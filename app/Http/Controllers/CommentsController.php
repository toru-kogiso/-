<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;
use App\User;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, Comment::$rules);
        
        $comments = new Comment;
        
        $user = \Auth::user();
        $form = $request->all();
        
        $comments->user_id = $user->id;
        $comments->user_name = $user->user_name;
        
        $comments->fill($form)->save();
        
        return redirect()->route('post.show', [$form['post_id']])->with('commentstatus','コメントを投稿しました');
    }
    
    public function delete(Request $request)
    {
        
        $comments = Comment::find($request->id);
        if ($comments != null) {
        $comments->delete();
        }
        
        $comment = Comment::find($request->post_id);
        $form = $request->all();
        
        return redirect()->route('post.show', ['post_id' => $comment]);
    }
}
