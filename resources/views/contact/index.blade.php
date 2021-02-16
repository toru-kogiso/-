@extends('layouts.form')

@section('title', 'お問い合せ')

@section('content')
    <div class="container"> 
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h1 class="page-title">お問い合せフォーム</h1>
                <form action="{{ action('FormController@confirm') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $error)
                               <li>{{ $error }}</li>
                            @endforeach    
                        </ul>
                    @endif
                    
                    <div class="form-group row">
                        <label class="col-md-6">メールアドレス</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-6">タイトル</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                  
                    <div class="form-group row">
                        <label class="col-md-6">お問い合せ内容</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="body" rows="10">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-dark" value="入力内容確認">
                </form>
            </div>
        </div>
    </div>

@endsection   