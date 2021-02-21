@extends('layouts.post')

@section('title', '新規投稿')

@section('content')
    <div class="container"> 
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2 class="page-title">新規投稿</h2>
                <form action="{{ action('PostController@create') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach    
                    @endif
                    <div class="form-group row">
                        <label class="col-md-6">タイトル</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                   
                    <div class="form-group row">
                        <label class="col-md-6">本文</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="body" rows="10">{{ old('body') }}</textarea>
                        </div>
                    </div>
                   
                    <div class="form-group row">
                        <label class="col-md-2">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file mb-2" name="image">
                        </div>
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-dark" value="投稿">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection   