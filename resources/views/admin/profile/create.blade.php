@extends('layouts.profile')

@section('title', 'プロフィール作成')

@section('content')
   <div class="container"> 
       <div class="row">
           <div class="col-md-8 mx-auto">
               <h1>プロフィール作成</h1>
               <form action="{{ action('Admin\ProfileController@create') }}" method="post" enctype="multipart/form-data">
                  @if (count($errors) > 0)
                       <ul>
                          @foreach($errors->all() as $e)
                               <li>{{ $e }}</li>
                           @endforeach    
                       </ul>
                  @endif
                  <div class="form-group row">
                     <label class="col-md-6">氏名</label>
                     <div class="col-md-9">
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                     </div>
                  </div>
                  
                  <div class="form-group row">
                     <label class="col-md-6">性別</label>
                    　<div class="col-md-9">
                      　<div class="form-check">
                          <label class="form-check-inline">
                             <input class="form-check-input" type="radio" name="gender" value="1" {{ is_array(old('gender')) && in_array("1", old('gender'), true)? 'checked="checked"' : '' }}> 男性
                          </label>
                          <label class="form-check-inline">
                             <input class="form-check-input" type="radio" name="gender" value="2" {{ is_array(old('gender')) && in_array("2", old('gender'), true)? 'checked="checked"' : '' }}> 女性
                         </label>
                         <label class="form-check-inline">
                             <input class="form-check-input" type="radio" name="gender" value="3" {{ is_array(old('gender')) && in_array("3", old('gender'), true)?' checked="checked"' : '' }}> 非公開
                         </label>
                     </div>
                  </div>
                 </div>
                  
                  <div class="form-group row">
                     <label class="col-md-6">年齢</label>
                     <div class="col-md-9">
                         <div class="form-check">
                          <label class="form-check-inline">
                             <input class="form-check-input" type="radio" name="generation" value="1" {{ is_array(old('generation')) && in_array("1", old('generation'), true)? 'checked="checked"' : '' }}> １０代以下
                          </label>
                          <label class="form-check-inline">
                             <input class="form-check-input" type="radio" name="generation" value="2" {{ is_array(old('generation')) && in_array("2", old('generation'), true)? 'checked="checked"' : '' }}> ２０代
                          </label>
                          <label class="form-check-inline">
                             <input class="form-check-input" type="radio" name="generation" value="3" {{ is_array(old('generation')) && in_array("3", old('generation'), true)? 'checked="checked"' : '' }}> ３０代
                          </label>
                          <label class="form-check-inline">
                             <input class="form-check-input" type="radio" name="generation" value="4" {{ is_array(old('generation')) && in_array("4", old('generation'), true)? 'checked="checked"' : '' }}> ４０代
                          </label>
                          <label class="form-check-inline">
                             <input class="form-check-input" type="radio" name="generation" value="5" {{ is_array(old('generation')) && in_array("5", old('generation'), true)? 'checked="checked"' : '' }}> ５０代以上
                          </label>
                     </div>
                  </div>
                 </div>
                  <div class="form-group row">
                     <label class="col-md-6">好きなアーティスト</label>
                     <div class="col-md-9">
                        <input type="text" class="form-control" name="artist" value="{{ old('artist') }}">
                     </div>
                  </div>
                  
                  <div class="form-group row">
                     <label class="col-md-6">自己紹介</label>
                     <div class="col-md-9">
                        <textarea class="form-control" name="introduction" rows="10">{{ old('introduction') }}</textarea>
                     </div>
                  </div>
                  
                  {{ csrf_field() }}
                  <input type="submit" class="btn btn-primary" value="登録">
               </form>   
           </div>
       </div>
   </div>

@endsection   