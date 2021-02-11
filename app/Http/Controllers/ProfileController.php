<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;
use App\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['user_index']);
    }
    
    public function add()
  {
    return view('profile.create');
  }
  
    public function create(Request $request)
  {
    $this->validate($request, Profile::$rules);
    $profiles = new Profile;
    
    $user = \Auth::user();//ユーザー情報取得
    
    $form = $request->all();
    
    unset($form['_token']);
    
    $profiles->user_id = $user->id;
    
    $profiles->fill($form);
    $profiles->save();
    
    return redirect('user');
  }

    public function edit(Request $request)
  {
    $profile = Profile::find($request->user_id);
    $user = Auth::user();
    $profile = $user->id;
    if (empty($profile)) {
        abort(404);
    }
    return view('profile.edit', ['profile_form' => $profile, 'user' => $user]);
  }

    public function update(Request $request)
  {
    $this->validate($request, Profile::$rules);
    
    $profile = Profile::find($request->id);
    $profiles_form = $request->all();
    
    unset($profiles_form['_token']);
    
    $profile->fill($profiles_form)->save();
    
    return redirect('user');
  }
  
}
