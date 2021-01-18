@extends('layouts.kadai')

@section('title', 'イベント情報')

@section('content')
<div class="button">
    <a href="{{ action('KadaiController@add') }}" role="button" class="btn btn-dark">新規作成</a>
</div>

<div class="container">
    <div class="header">
        <h2>イベント情報</h2>
        <p>EVENT</p>
        <span>__</span>
    </div>
    
    <div class="body">
         @foreach($events as $event)
              <div class="box">
                 <div class="text">
                     <h3 class="title">{{ $event->title }}</h3>
                     <p class="body"> {{ $event->body }}</p>
                 </div>
                 <div class="pic">
                 <img src="{{ asset('storage/image/' . $event->image_path) }}">
                 </div>
              </div>
         @endforeach
    </div>
</div>



@endsection