@extends('layouts.mypage')

@section('title', 'ユーザーページ')

@section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">ユーザー登録内容の変更</div>
                        <div class="card-body">
                            <form method="POST" action="{{ action('UserController@update') }}">
                                <div class="form-group">
                                    <label for="user_name">ユーザー名</label>
                                    <div>
                                        <input type="text" name="user_name" class="form-control" value="{{ $user->user_name }}">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-dark">更新</button>
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
@endsection         