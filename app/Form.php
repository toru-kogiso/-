<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
      protected $fillable = [
        'gender',
        'generation',
        'title',
        'body'
        ];
     
     public static $rules = array(
        'title' => 'required',
        'body' => 'required',
        );
}
