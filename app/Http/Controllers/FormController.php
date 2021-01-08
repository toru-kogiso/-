<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;
use App\Form;

class FormController extends Controller
{
    public function add()
    {
        return view('form.create');
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Form::$rules);
        $forms = new Form;
        $form = $request->all();
    
        unset($form['_token']);
    
        $forms->fill($form);
        $forms->save();
        
        return view('form.create');
    }
}
