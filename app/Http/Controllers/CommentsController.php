<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;
use App\User;
use App\Post;

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
        $id = Comment::find($request->post_id);
        
        $comments = Comment::find($request->id);
        if ($comments != null) {
        $comments->delete();
        }
        
        return redirect()->route('post.show', ['id' => $id]);
    }
}
