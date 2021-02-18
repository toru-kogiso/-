@extends('layouts.mypage')

@section('title', 'ユーザーページ')

@section('content')
<div class="container">
    <div class="row">
        <h1 class="page-title col-md-12">{{ $user->user_name }}さんのページ</h1>
    </div>
    <div class="row">
        <div class="profile col-md-6 mx-auto">
            <div class="user_card">
                <div class="card-header">ユーザー情報</div>
                <div class="card-body">
                    <div class="form-group item">
                       <label for="name">ユーザー名</label>
                       <p>{{ $user->user_name }}</p>
                    </div>
                    <!--ここからprofile-->
                    @if ( $user->profiles )
                        <div class="form-group item">
                            <label for="gender">性別</label>
                            <p>{{ $user->profiles->gender}}</p>
                        </div>
                        <div class="form-group item">
                            <label for="gender">年齢</label>
                            <p>{{ $user->profiles->generation}}</p>
                        </div>
                        <div class="form-group text">
                            <label for="gender" class="title">好きなアーティスト</label>
                            <p>{!! nl2br(e($user->profiles->artist)) !!}</p>
                        </div>
                        <div class="form-group text">
                            <label for="gender" class="title">自己紹介</label>
                            <p>{!! nl2br(e($user->profiles->introduction)) !!}</p>
                        </div>
                    @else <p>プロフィールが登録されていません</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!--ここまでプロフィール-->
    <div class="row">
        <h2 class="page-title col-md-12">{{ $user->user_name }}さんの投稿一覧</h2>
    </div>
    <div class="row">
        <div class="user_post">
            @foreach($posts as $post)
                <div class="card">
                    <a href="{{ action('PostController@show', $post->id) }}">
                    <div class="card-img">
                        @if ($post->image_path)
                            <img class="photo" src="{{ $post->image_path }}"　alt="投稿画像">
                        @else
                            <div class="no_image1"><p class="caption">この投稿に画像はありません</p></div>
                        @endif       
                    </div>
                    </a>
                    <div class="card-body">
                        <h2 class="card-title">{{ $post->title }}</h2>
                        <hr>
                        <p class="card-text">{!! nl2br(e($post->body)) !!} </p>
                        <p class="card-date">{{ $post->created_at->format('Y年m月d日') }}</p>
                        <p class="likes">いいね{{ $post->likes_count }}</p>
                        <p class="btn-group">{{-- 自分の投稿だったら編集・削除できる --}}
                            @if (Auth::check())
                                @if( ( $post->user_id ) === ( Auth::user()->id ) ) 
                                    <a href="{{ action('PostController@edit', ['id' => $post->id]) }}" class="btn btn-warning">編集</a>
                                    <a href="{{ action('PostController@delete', ['id' => $post->id]) }}" class="btn btn-danger">削除</a>
                                @endif
                            @endif
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
        <!--投稿一覧ここまで-->
        <div class="paginate">{{ $posts->links() }}</div>
    </div>
</div>
@endsection    