@extends('layouts.form')

@section('title', 'お問合せ')

@section('content')
   <div class="container"> 
       <div class="row">
           <div class="col-md-8 mx-auto">
               <h1 class="page-title">お問合せフォーム</h1>
               <form action="{{ action('FormController@create') }}" method="post" enctype="multipart/form-data">
                  @if (count($errors) > 0)
                       <ul>
                          @foreach($errors->all() as $e)
                               <li>{{ $e }}</li>
                           @endforeach    
                       </ul>
                  @endif
                  
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
                     <label class="col-md-6">タイトル</label>
                     <div class="col-md-9">
                        <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                     </div>
                  </div>
                  
                  <div class="form-group row">
                     <label class="col-md-6">お問合せ内容</label>
                     <div class="col-md-9">
                        <textarea class="form-control" name="body" rows="10">{{ old('body') }}</textarea>
                     </div>
                  </div>
                  
                  {{ csrf_field() }}
                  <input type="submit" class="btn btn-dark" value="送信">
               </form>
               
               
           </div>
       </div>
   </div>

@endsection   