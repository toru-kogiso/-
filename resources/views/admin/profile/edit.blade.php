@extends('layouts.profile')
@section('title', 'プロフィールの編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h1>プロフィール編集</h1>
                <form action="{{ action('Admin\ProfileController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="name">氏名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ $profiles_form->name }}">
                        </div>
                    </div>
                   <div class="form-group row">
                     <label class="col-md-6">性別</label>
                    　<div class="col-md-9">
                      　<div class="form-check">
                          <label class="form-check-inline">
                             <input class="form-check-input" type="radio" name="gender" value="{{ $profiles_form->gender }}" {{ is_array(old('gender')) && in_array("1", old('gender'), true)? 'checked="checked"' : '' }}> 男性
                          </label>
                          <label class="form-check-inline">
                             <input class="form-check-input" type="radio" name="gender" value="{{ $profiles_form->gender }}" {{ is_array(old('gender')) && in_array("2", old('gender'), true)? 'checked="checked"' : '' }}> 女性
                         </label>
                         <label class="form-check-inline">
                             <input class="form-check-input" type="radio" name="gender" value="{{ $profiles_form->gender }}" {{ is_array(old('gender')) && in_array("3", old('gender'), true)?' checked="checked"' : '' }}> 非公開
                         </label>
                     </div>
                  </div>
                 </div>
                  
                  <div class="form-group row">
                     <label class="col-md-6">年齢</label>
                     <div class="col-md-9">
                         <div class="form-check">
                          <label class="form-check-inline">
                             <input class="form-check-input" type="radio" name="generation" value="{{ $profiles_form->generation }}" {{ is_array(old('generation')) && in_array("1", old('generation'), true)? 'checked="checked"' : '' }}> １０代以下
                          </label>
                          <label class="form-check-inline">
                             <input class="form-check-input" type="radio" name="generation" value="{{ $profiles_form->generation }}" {{ is_array(old('generation')) && in_array("2", old('generation'), true)? 'checked="checked"' : '' }}> ２０代
                          </label>
                          <label class="form-check-inline">
                             <input class="form-check-input" type="radio" name="generation" value="{{ $profiles_form->generation }}" {{ is_array(old('generation')) && in_array("3", old('generation'), true)? 'checked="checked"' : '' }}> ３０代
                          </label>
                          <label class="form-check-inline">
                             <input class="form-check-input" type="radio" name="generation" value="{{ $profiles_form->generation }}" {{ is_array(old('generation')) && in_array("4", old('generation'), true)? 'checked="checked"' : '' }}> ４０代
                          </label>
                          <label class="form-check-inline">
                             <input class="form-check-input" type="radio" name="generation" value="{{ $profiles_form->generation }}" {{ is_array(old('generation')) && in_array("5", old('generation'), true)? 'checked="checked"' : '' }}> ５０代以上
                          </label>
                     </div>
                  </div>
                 </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="introduction">好きなアーティスト</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="artist" value="{{ $profiles_form->artist }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="introduction">自己紹介</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="introduction" value="{{ $profiles_form->introduction }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $profiles_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection    