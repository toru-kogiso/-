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
        <div class="summary">
            <h5><span>{{ Auth::user()->name }}</span> / <time>{{ $post->created_at->format('Y年m月d日') }}</time></h5>
        </div>
        
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
        
    </div>
</div>

@endsection
