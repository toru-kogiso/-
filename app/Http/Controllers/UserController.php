<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;
use App\Post;
use App\User;
use App\Profile;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function user_index(Request $request)
    {
        $user = Auth::user();//userデータ取得
    
        return view ('user.user_index',['user' => $user]);
    }
    
    public function edit() {
        $user = Auth::user();
        
        return view('user.edit',['user' => $user]);
    }
    
    public function update(Request $request) {

        $user_form = $request->all();
        $user = Auth::user();
        //不要な「_token」の削除
        unset($user_form['_token']);
        //保存
        $user->fill($user_form)->save();
        
        
        return redirect('user');
    }
    
    public function show($id) {
        $user = User::find($id);
        
        return view('user.show', ['user' => $user]);
    }
}