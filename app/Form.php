<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
      protected $fillable = [
        'email',
        'title',
        'body'
        ];
     
     public static $rules = array(
        'email' => 'required|email',
        'title' => 'required',
        'body' => 'required',
        );
}
