<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public $guarded = array('id');
    
    public static $rules = array(
        'name' => 'required',
        'gender' => 'required',
        'generation' => 'required',
        'artist' => 'required',
        'introduction' => 'required',
        );
}
