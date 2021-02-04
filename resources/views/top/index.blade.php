@extends('layouts.top')

@section('title', 'MusicFans')

@section('content')
<div class="container-fulid">
    <div class="row">
        <div class="top_image">
            <h1>Music Fans</h1>
        </div>
    </div>
</div> 
<div class="container top-main">
        <div class="row">
            <h2 class="page-title col-md-12 mx-auto">最新投稿</h2>
        </div>
        <div class="row top-post">
            <div class="new-post">
            @foreach($posts as $post)
                <div class="card">
                    <a href="{{ action('PostController@show', $post->id) }}">
                    <div class="card-img">
                        @if ($post->image_path)
                            <img class="photo" src="{{ $post->image_path }}"　alt="投稿画像">
                        @else
                            <div class="no_image"><p class="caption">この投稿に画像はありません</p></div>
                        @endif       
                    </div>
                    </a>
                    <div class="card-body">
                        <h4 class="card-title">{{ $post->title }}</h4>
                        <hr>
                        <p class="card-text">{!! nl2br(e($post->body)) !!} </p>
                        <p class="card-date">{{ $post->created_at->format('Y年m月d日') }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="button">
            <a href="{{ action('PostController@post_index') }}" class="btn btn-dark">ほかの投稿も見る</a>
        </div>
    </div>
    <div class="row">
        <div class="about col-md-12 mx-auto">
            <h2>MusicFans<span class="letter">とは</span></h2>
            <p>コロナ禍でのおうち時間を音楽で有意義に過ごしたい</p>
            <p>テレワーク、家事、読書、ワークアウト、ティータイムなど</p>
            <p>そんな時にピッタリの曲、聴いて欲しい曲をたくさんの方と共有したいと思い立ち上げたサイトです。</p>
            <p>ライブやフェスに行きたくてもいけない世の中ですが、皆さんの知ってるアーティストや曲を共有し</p>
            <p>生で聴けるようになるその日まで音楽を止めずに乗り越えていきましょう！</p>
        </div>
    </div>
</div>
@endsection