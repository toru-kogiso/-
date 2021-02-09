<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;
use App\Http\Requests;
use App\Post;
use App\User;
use InterventionImage;
use Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['post_index']);
    }
    
    
    public function add()
    {
        return view('post.create');
    }
    
    public function post_index(Request $request)
    {
         //作成順に並び替え(1ページ9投稿)
        $posts = Post::orderBy('created_at', 'DESC')->paginate(9); //投稿順表示
        
        $cond_title = $request->cond_title;
        
        if ($cond_title != '') {
            $posts= Post::where('title', $cond_title)->latest()->paginate(9);//検索された検索結果を取得する
        } else {
            $posts = Post::orderBy('created_at', 'DESC')->paginate(9);
        }
        
        return view('post.post_index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    public function create(Request $request)
    {
      $this->validate($request, Post::$rules);
      
      $posts = new Post;
      
      $user = \Auth::user();//ユーザー情報取得
     
      $form = $request->all();
      // formに画像があれば、保存する
        if (isset($form['image'])) {
            $image = Storage::disk('s3')->putFile('/', $form['image'], 'public');
            
	        $posts->image_path = storage::disk('s3')->url($image);

      } else {
         $posts->image_path = null;
      }
      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      // フォームから送信されてきたimageを削除する
      unset($form['image']);
      
      $posts->user_id = $user->id;
      $posts->user_name = $user->user_name;
     
      // データベースに保存する
      $posts->fill($form);
      $posts->save();
      
     return redirect('post');
    }

    public function edit(Request $request)
    {
        $posts = Post::find($request->id);
        if (empty($posts)) {
            about(404);
        }
        return view('post.edit',['posts_form' => $posts]);
    }
    
    
    public function update(Request $request)
    {
        $this->validate($request, Post::$rules);
        
        $posts = Post::find($request->id);
        
        $form = $request->all();
        $posts_form = $request->all();
        if ($request->remove == 'true') {
          $posts_form['image_path'] = null;
          
      } elseif ($request->file('image')) {
            $image = Storage::disk('s3')->putFile('/', $form['image'], 'public');
	        $posts_form['image_path'] = storage::disk('s3')->url($image);
          
      } else {
          $posts_form['image_path'] = $posts->image_path;
      }
        
        unset($posts_form['image']);
        unset($posts_form['remove']);
        unset($posts_form['_token']);
    
        $posts->fill($posts_form)->save();
    
        return redirect('post');
    }
    
    public function delete(Request $request)
    {
        $posts = Post::find($request->id);
        
        $posts->delete();
        
        return redirect('post');
    }
    
    public function show($id)
    {   
        $authUser = Auth::user(); //認証ユーザー取得
        $post = Post::findOrFail($id);
        
        $like = $post->likes()->where('user_id', Auth::user()->id)->first();

        return view('post.show', ['post' => $post, 'authUser' => $authUser, 'like' => $like]);
    }
}
