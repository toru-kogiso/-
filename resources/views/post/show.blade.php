@extends('layouts.post')

@section('title', '投稿詳細')

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="summary col-md-6">
                <!-- タイトル -->
                <h2 class="post-title">{{ $post->title }}</h2>
                <!-- 投稿情報 -->
                <p>{{ $post->user->user_name }} / {{ $post->created_at->format('Y年m月d日') }}</p>
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
        <div class="btngl row">
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
        <!--コメント-->
        <div class="row">
            <h3 class="col-md-12">コメント</h3>
            @forelse($post->comments as $comment)
                <div class="comment col-md-8 border-top">
                    <time class="text-secondary">
                        {{ $comment->user_name }} / 
                        {{ $comment->created_at->format('Y年m月d日 H:i') }}
                    </time>
                    <p class="mt-2">
                        {!! nl2br(e($comment->comment)) !!}
                    </p>
                    <p class="btn-group">{{-- 自分のコメントだったら編集・削除できる --}}
                        @if (Auth::check())
                            @if( ( $post->user_id ) === ( Auth::user()->id ) ) 
                                <a href="{{ action('PostController@edit', ['id' => $post->id]) }}" class="btn btn-warning">編集</a>
                                <a href="{{ action('PostController@delete', ['id' => $post->id]) }}" class="btn btn-danger">削除</a>
                            @endif
                        @endif
                    </p>
                </div>
            @empty
                <p>コメントはまだありません。</p>
            @endforelse
            
            <form class="col-md-8" method="POST" action="{{ action('CommentsController@store') }}">
                @csrf
                <input name="post_id" type="hidden" value="{{ $post->id }}">
                <div class="form-group">
                    <label for="body">本文</label>
                    <textarea id="comment" name="comment" class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }}" rows="4">{{ old('comment') }}</textarea>
                        @if ($errors->has('comment'))
                            <div class="invalid-feedback">
                            {{ $errors->first('comment') }}
                            </div>
                        @endif
                </div>
                <div class="mt-4">
                 <button type="submit" class="btn btn-primary">
                 コメントする
                 </button>
                </div>
            </form>
            @if (session('commentstatus'))
                <div class="alert alert-success mt-4 mb-4 col-md-8">
                 {{ session('commentstatus') }}
                </div>
            @endif
        </div>
    </div>

@endsection
