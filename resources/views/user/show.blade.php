@extends('layouts.mypage')

@section('title', 'ユーザーページ')

@section('content')
<div class="container">
    <div class="row">
        <h1 class="page-title col-md-12">{{ $user->user_name }}さんのページ</h1>
    </div>
    <div class="row">
        <div class="profile col-md-4">
            <div class="card">
                <div class="card-header">ユーザー情報</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">ユーザー名</label>
                        <p>{{ $user->user_name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection    