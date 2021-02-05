<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;
use App\Post;
use App\User;

class MypageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function mypage_index()
    {
        $user = \Auth::user();
        
        return view ('mypage.mypage_index');
    }
}
