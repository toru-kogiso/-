<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;
use App\Form;
use App\Mail\FormSendmail;

class FormController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }
    
    public function confirm(Request $request)
    {
        $this->validate($request, Form::$rules);
        $forms = new Form;
        $form = $request->all();
    
        unset($form['_token']);
    
        $forms->fill($form);
        $forms->save();
        
        return view('contact.confirm', ['forms' => $forms]);
    }
    
    public function send(Request $request)
    {
        $this->validate($request, Form::$rules);
        //フォームから受け取ったactionの値を取得
        $action = $request->input('action');
        
        //フォームから受け取ったactionを除いた値を取得
        $forms = $request->except('action');

        //actionの値で分岐
        if ($action !== 'submit'){
            return redirect()
                ->route('contact')
                ->withInput($forms);
        } else {
            //入力されたメールアドレスにメールを送信
            \Mail::to($forms['email'])->send(new FormSendmail($forms));
            //問い合わせ受信
            \Mail::to('toru.fonn@gmail.com')->send(new FormSendmail($forms));
            //再送信を防ぐためにトークンを再発行
            $request->session()->regenerateToken();

            //送信完了ページのviewを表示
            return view('contact.thanks');
        }
    }
}
