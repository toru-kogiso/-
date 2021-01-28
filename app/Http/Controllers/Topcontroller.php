<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;
use App\Post;

class Topcontroller extends Controller
{
    public function index(Request $request)
    {
        
        $posts = Post::orderBy('created_at', 'DESC')->take(3)->get(); //投稿順に3件表示
        
        return view('top.index', ['posts' => $posts,]); 
    }
}
