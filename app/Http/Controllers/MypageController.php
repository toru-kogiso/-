<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;

class MypageController extends Controller
{
    public function add()
    {
        return view ('mypage.mypage_index');
    }
}
