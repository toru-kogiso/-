<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class PostController extends Controller
{
    //
    public function add()
    {
        return view('admin.post.create');
    }
    
    public function create(Request $request)
    {
        
      $this->validate($request, Post::$rules);
      
      $posts = new Post;
      $form = $request->all();
      
        if (isset($form['image'])) {
        $path = $request->file('image')->store('public/image');
        $posts->image_path = basename($path);
      } else {
         $posts->image_path = null;
      }
      
      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      // フォームから送信されてきたimageを削除する
      unset($form['image']);
     
      // データベースに保存する
      $posts->fill($form);
      $posts->save();
         
     return redirect('admin/post');
    }
    
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            $posts= Post::where('title', $cond_title)->get();
        } else {
            $posts = Post::all();
        }
        return view('admin.post.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    public function edit(Request $request)
    {
        $posts = Post::find($request->id);
        if (empty($posts)) {
            about(404);
        }
        return view('admin.post.edit',['posts_form' => $posts]);
    }
    
    public function update(Request $request)
    {
        $this->validate($request, Post::$rules);
        $posts = Post::find($request->id);
        $posts_form = $request->all();
        if ($request->remove == 'true') {
          $posts_form['image_path'] = null;
      } elseif ($request->file('image')) {
          $path = $request->file('image')->store('public/image');
          $posts_form['image_path'] = basename($path);
      } else {
          $posts_form['image_path'] = $posts->image_path;
      }
        
        unset($posts_form['_token']);
        
        $posts->fill($posts_form)->save();
        
        return redirect('admin/post');
    }
    
    public function delete(Request $request)
    {
        $posts = Post::find($request->id);
        
        $posts->delete();
        
        return redirect('admin/post');
    }
}
