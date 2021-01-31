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
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th>@guest ID @else ユーザー名 @endguest</th>
                                <th width = 10%>タイトル</th>
                                <th width = 30%>本文</th>
                                <th></th>
                                <th>いいね</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                               <tr>
                                    <td>
                                        @guest {{ $post->id }}
                                        
                                        @else {{ $post->user_name }}
                                        
                                        @endguest
                                    </td>
                                    <td>{{ \Str::limit($post->title, 100) }}</td>
                                    <td>{{ \Str::limit($post->body, 250) }}</td>
                                    <td><a href="{{ action('PostController@show', $post->id) }}" class="btn btn-dark">詳細</a></td>
                                    <td>{{ $post->likes_count }}</td>
                                    <td>    
                                      <div class="btn-toolbar">
                                      <div class="btn-group">{{-- 自分の投稿だったら編集・削除できる --}}
                                     @if (Auth::check())
                                      @if( ( $post->user_id ) === ( Auth::user()->id ) ) 
                                         <div><a href="{{ action('PostController@edit', ['id' => $post->id]) }}" class="btn btn-warning">編集</a></div>
                                         <div><a href="{{ action('PostController@delete', ['id' => $post->id]) }}" class="btn btn-dark">削除</a></div>
                                      @endif
                                     @endif
                                    </td> 
                                    </div>
                                    </div>
                                </tr>    
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection