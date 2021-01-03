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
}
