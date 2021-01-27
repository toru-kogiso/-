@extends('layouts.top')

@section('title', 'MusicFans')

@section('content')
    <div class="container-fulid">
        <div class="row">
            <div class="top_image">
            <img src="{{ asset('storage/image/top_image.jpg') }}" alt="トップ画像">
                <p>Music Fans</p>
            </div>
        </div>
    </div> 
    <div class="container">
        <div class="row">
            <h1 class="page-title col-md-12 mx-auto">最新投稿</h1>
        </div>
        <hr color="#c0c0c0">
        @if (!is_null($headline))
            <div class="row">
                <div class="headline mx-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="caption mx-auto">
                                <div class="image">
                                    @if ($headline->image_path)
                                        <img src="{{ $headline->image_path }}">
                                    @endif
                                </div>
                                <div class="title p-2">
                                    <h1>{{ str_limit($headline->title, 70) }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p class="body mx-auto">{!! nl2br(e($headline->body)) !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <hr color="#c0c0c0">
        <div class="row">
            <div class="about col-md-12 mx-auto">
            <h1>MusicFans<span>とは</span></h1>
        <hr color="#c0c0c0">
            <h3>
                コロナ禍でのおうち時間を音楽で有意義に過ごしたい<br>
                テレワーク、家事、読書、ワークアウト、ティータイムなど<br>
                そんな時にピッタリの曲、聴いて欲しい曲をたくさんの方と共有したいと思い立ち上げたサイトです。<br>
                ライブやフェスに行きたくてもいけない世の中ですが、皆さんの知ってるアーティストや曲を共有し<br>
                生で聴けるようになるその日まで音楽を止めずに乗り越えていきましょう！
            </h3>
            </div>
        </div>
        <hr color="#c0c0c0">
    </div>
        
@endsection