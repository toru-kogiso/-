<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'body',
        'image_path'
        ];
    
    public static $rules = array(
        'title' => 'required',
        'body' => 'required'
        );
}
