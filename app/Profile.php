<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Profile extends Model
{
    protected $table = 'profiles';
    
    protected $fillable = [
        'user_id',
        'gender',
        'generation',
        'artist',
        'introduction'
        ];
    
    public static $rules = array(
        'gender' => 'required',
        'generation' => 'required',
        'artist' => 'required',
        'introduction' => 'required',
        );
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
