<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;
use App\Http\Requests;
use App\Event;

class KadaiController extends Controller
{
    public function add()
    {
        return view('kadai/create');
    }
    
    public function kadai_index()
    {
        $events = Event::all()->sortByDesc('created_at');
        
        return view('kadai.kadai_index', ['events' => $events]);
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Event::$rules);
        
        $events = new Event;
        $form = $request->all();
        
        if (isset($form['image'])) {
         $path = $request->file('image')->store('public/image');
         $events->image_path = basename($path);
      } else {
         $events->image_path = null;
      }
         unset($form['_token']);
         unset($form['image']);
      
      $events->fill($form);
      $events->save();
      
        return redirect('kadai');
    }
}
