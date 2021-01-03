@extends('layouts.post')

@section('title', '投稿一覧')

@section('content')
    <div class="container">
      <div class="header">
          <h1>投稿一覧</h1>
      </div>
       <div class="row">
            <div class="col-md-4">
                <a href="{{ action('PostController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('PostController@post_index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th width="10%">ユーザー名</th>
                                <th width="20%">タイトル</th>
                                <th width="50%">本文</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                               <tr>
                                    <td>{{ Auth::user()->name }}</td>
                                    <td>{{ \Str::limit($post->title, 100) }}</td>
                                    <td>{{ \Str::limit($post->body, 250) }}</td>
                                    
                                      @if( ( $post->user_id ) === ( Auth::user()->id ) )
                                         <td><a href="{{ action('PostController@edit', ['id' => $post->id]) }}">編集</a></td>
                                         <td><a href="{{ action('PostController@delete', ['id' => $post->id]) }}">削除</a></td>
                                      @endif
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection