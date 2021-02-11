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
                    <div class="form-group item">
                        <label for="name">ユーザー名/{{ $user->user_name }}</label>
                        @if (Auth::check())
                            @if( ( $user->id ) === ( Auth::user()->id ) ) 
                                <a href="{{ action('UserController@edit') }}" class="btn btn-dark">編集</a>
                            @endif
                        @endif
                    </div>
                    {{-- ここからProfile --}}
                    <div class="form-group item">
                        <label for="gender">性別/{{ $user->profiles->gender}}</label>
                    </div>
                    <div class="form-group item">
                        <label for="gender">年齢/{{ $user->profiles->generation}}</label>
                        
                    </div>
                    <div class="form-group">
                        <label for="gender">好きなアーティスト</label>
                        <p>{{ $user->profiles->artist}}</p>
                    </div>
                    <div class="form-group">
                        <label for="gender">自己紹介</label>
                        <p>{{ $user->profiles->introduction}}</p>
                    </div>
                    
                    <a href="{{ action('ProfileController@edit') }}" class="btn btn-dark">プロフィール編集</a>
                    <a href="{{ action('ProfileController@create') }}" class="btn btn-dark">プロフィール作成</a>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection    