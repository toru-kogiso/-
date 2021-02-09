@extends('layouts.mypage')

@section('title', 'マイページ')

@section('content')
<div class="container">
    <div class="row">
        <h1 class="page-title col-md-12">マイページ</h1>
    </div>
    <div class="row">
        <div class="profile col-md-4">
            <div class="card">
                <div class="card-header">ユーザー登録情報</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">ユーザー名</label>
                        <p>{{ $user->user_name }}</p>
                    </div>
                    
                        <div class="form-group">
                            <label for="gender">性別</label>
                            <p>{{ $profile->artist }}</p>
                        </div>
                    
                        <a href="{{ action('ProfileController@create') }}" class="btn btn-dark">プロフィール作成</a>
                    
                    
                    @if (Auth::check())
                        @if( ( $user->id ) === ( Auth::user()->id ) ) 
                            <a href="{{ action('UserController@edit') }}" class="btn btn-dark">編集</a>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection    