<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Like;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'body'
        ];
    
    public static $rules = array(
        'title' => 'required',
        'body' => 'required',
        );
    
    public function user() //主テーブル<-従テーブル
    {
        return $this->belongsTo(User::class);
    }
    
    public function likes()
    {
      return $this->hasMany('App\Like');
    }

    public function like_by()
    {
      return Like::where('user_id', Auth::user()->id)->first();
    }
}
