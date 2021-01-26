<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;
use App\Post;

class Topcontroller extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::all()->sortByDesc('created_at');
        
        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }    
        
        return view('top.index', ['headline' => $headline, 'posts' => $posts,]);
    }
}
