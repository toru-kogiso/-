@extends('layouts.form')

@section('title', 'お問い合せ内容確認')

@section('content')
    <div class="container"> 
        <div class="row justify-content-center">
            <div class="col-md-8 mx-auto">
                <form action="{{ action('FormController@send') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $error)
                               <li>{{ $error }}</li>
                            @endforeach    
                        </ul>
                    @endif
                    <div class="form_card">
                        <div class="card-header">お問い合わせ内容</div>
                        <div class="card-body">
                            <div class="form-group confirm">
                                <label for="email">メールアドレス</label>
                                <p>{{ $forms['email'] }}</p>
                                <input type="hidden" class="form-control" name="email" value="{{ $forms['email'] }}">
                            </div>
                            
                            <div class="form-group confirm">
                                <label for="title">タイトル</label>
                                <p>{{ $forms['title'] }}</p>
                                    <input type="hidden" class="form-control" name="title" value="{{ $forms['title'] }}">
                            </div>
                          
                            <div class="form-group confirm">
                                <label for="body">お問合せ内容</label>
                                <p>{!! nl2br(e($forms['body'])) !!}</p>
                                    <input type="hidden" class="form-control" name="body" value="{{ $forms['body'] }}">
                            </div>
                            
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-dark" name="action" value="back">入力内容修正</button>
                    <button type="submit" class="btn btn-dark" name="action" value="submit">送信する</button>
                </form>
            </div>
        </div>
    </div>

@endsection   