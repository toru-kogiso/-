@extends('layouts.post')

@section('title', '投稿詳細')

@section('content')
<div class="container mt-4">
    <div class="border p-4">
        <!-- タイトル -->
        <h2 class="title">
            {{ $post->title }}
        </h2>
        <!-- 投稿情報 -->
        <span>{{ $post->user_name }}</span> / <time>{{ $post->created_at->format('Y年m月d日') }}</time>
        <hr color="#c0c0c0">
        
        <!-- 本文 -->
        <div class="body">
            {!! nl2br(e($post->body)) !!} <!-- 改行表示 -->
        </div>
        
        <!-- 画像 -->
        <div class="image">
            @if ($post->image_path)
                <img src="{{ asset('storage/image/' . $post->image_path) }}">
            @endif       
        </div>
        
        <!-- 一覧に戻るボタン -->
        <div class="back">
            <div class="d-flex justify-content-end">
            <a href="{{ action('PostController@post_index') }}" class="btn btn-primary">一覧に戻る</a>
            </div>
        </div>
        
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
</div>

@endsection
