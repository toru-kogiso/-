@extends('layouts.kadai')

@section('title', 'イベント情報')

@section('content')
<div class="button">
    <a href="{{ action('KadaiController@add') }}" role="button" class="btn btn-dark">新規作成</a>
</div>

<div class="container">
    <div class="header">
        <h2 class="page-title">イベント情報</h2>
        <p class="sub-title">EVENT</p>
        <p class="title-bar">
        <span class="one">__</span><span class="two">__</span><span class="three">__</span><span class="four">__</span>
        </p>
    </div>
    
    <div class="body">
         @foreach($events as $event)
              <div class="card">
                  <div class="card-img">
                 <img src="{{ asset('storage/image/' . $event->image_path) }}">
                 </div>
                 <div class="card-content">
                     <h3 class="card-title">{{ $event->title }}</h3>
                     <span class="card-bar">__</span>
                     <p class="card-text"> {{ $event->body }}</p>
                 </div>
              </div>
         @endforeach
    </div>
</div>

@endsection