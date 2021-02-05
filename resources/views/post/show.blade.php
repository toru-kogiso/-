@extends('layouts.post')

@section('title', '投稿詳細')

@section('content')
<div class="container mt-2">
    <div class="row">
        <div class="summary col-md-6">
            <!-- タイトル -->
            <h2 class="post-title">{{ $post->title }}</h2>
            <!-- 投稿情報 -->
            <p>{{ $post->user_name }} / {{ $post->created_at->format('Y年m月d日') }}</p>
            <!-- 本文 -->
            <div class="post-body">
                {!! nl2br(e($post->body)) !!} <!-- 改行表示 -->
            </div>
        </div>
        <!-- 画像 -->
        <div class="post-image col-md-6 mx-auto">
            @if ($post->image_path)
                <img class="photo" src="{{ $post->image_path }}"　alt="投稿画像">
            @else
                <div class="no_image2"><p class="caption">この投稿に画像はありません</p></div>
            @endif       
        </div>
    </div>    
    <div class="row">
        <!-- いいね・一覧に戻るボタン -->
        <div class="btn1">
            <!-- いいねボタン -->
            @if (Auth::check())
                @if ($like)
                    <!-- いいね取り消しフォーム -->
                    {{ Form::model($post, array('action' => array('LikesController@destroy', $post->id, $like->id))) }}
                        <button type="submit">
                            ♡  {{ $post->likes_count }}　いいねを取り消す
                        </button>
                    {!! Form::close() !!}
                @else
                    <!-- いいねフォーム -->
                    {{ Form::model($post, array('action' => array('LikesController@store', $post->id))) }}
                        <button type="submit">
                            ♡ {{ $post->likes_count }} いいね！
                        </button>
                    {!! Form::close() !!}
                @endif
            @endif
        </div>
        <div class="btn2">
            <a href="{{ action('PostController@post_index') }}" class="btn btn-dark">一覧に戻る</a>
        </div>
    </div>
</div>

@endsection
