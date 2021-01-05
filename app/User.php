<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function posts() //postsテーブルと紐づけ
    {
        return $this-> hasMany('App\Post');
    }
    
    public function likes() //likesテーブルと紐づけ
    {
        return $this->belongToMany(Post::class, 'likes', 'user_id', 'post_id')->withTimestamp();
    }
    
    //いいね機能
    public function like($postId) //いいねを付ける
    {
        $exist = $this->is_like($postId);
        
        if($exist){
            return false;
        }else{
            $this->likes()->attach($postId);
            return true;
        }
    }
    
    public function unlike($postId) //いいね外す
    {
        $exist = $this->is_like($postId);
        
        if($exist){
            $this->likes()->detach($postId);
            return true;
        }else{
            return false;
        }    
    }
    
    public function is_like($postId) //既にいいねしてるか確認
    {
        return $this->likes()->where('post_id',$postId)->exists();
    }
}
