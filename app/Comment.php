<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'post_id',
        'user_name',
        'comment', 
    ];
    
    public static $rules = array(
        'comment' => 'required|max:350',
        );
    
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
