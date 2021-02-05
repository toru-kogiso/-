@extends('layouts.post')

@section('title', '投稿一覧')

@section('content')
    <div class="container">
        <div class="row">
          <h1 class="page-title col-md-12 mx-auto">投稿一覧</h1>
        </div>
        <div class="row">
            <div class="col-md-8">
                <form action="{{ action('PostController@post_index') }}" method="get">
                    <div class="form-group">
                        <input type="search" class="form-control" name="cond_title" placeholder="タイトル" value="{{ $cond_title }}">
                            {{ csrf_field() }}
                        <input type="submit" class="btn btn-dark" value="検索">
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <a href="{{ action('PostController@add') }}" role="button" class="btn btn-dark order1">新規作成</a>
          </div>
        </div>
        <div class="row">
            <div class="content">
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
                            <h4 class="card-title">{{ $post->title }}</h4>
                            <hr>
                            <p class="card-text">{!! nl2br(e($post->body)) !!} </p>
                            <p class="card-date">{{ $post->created_at->format('Y年m月d日') }}/@guest 匿名(ログイン後表示) @else {{$post->user_name }}さん@endguest</p>
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
            <div class="paginate">{{ $posts->links() }}</div>
        </div>
    </div>
@endsection