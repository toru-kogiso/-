@extends('layouts.mypage')

@section('title', 'マイページ')

@section('content')
    <div class="container">
      <div class="row">
        <h1 class="page-title col-md-12">マイページ</h1>
      </div>
      <div class="row">
        <div class="profile col-md-4">
          <h2>プロフィール</h2>
          <p class="name">ユーザー名</p>
          <p>{{ $user->user_name }}</p>
        </div>
      </div>
    </div>
@endsection    