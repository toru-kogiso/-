<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function like_users() //いいねしているユーザーを抜き出す
    {
        return $this->belongsToMany(User::class,'likes','post_id','user_id')->withTimestamp();
    }
}
