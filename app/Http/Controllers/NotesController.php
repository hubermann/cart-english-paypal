<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Note;

class NotesController extends Controller
{
    
	public function index()
	{
		$notes = Note::all();
		return View('backend.notes.all', ['notes' => $notes]);
	}
    
    public function newNote()
    {
    	return View('backend.notes.new');
    }

    public function create()
    {
    	$rules = [
        'title' => 'required|unique:notes|max:255',
        'body' => 'required',
    	];

	    $validator = Validator::make(Input::all(), $rules);

	    if ($validator->fails())
	    {
	        return redirect('/backend/notes/new')->withErrors($validator)->withInput();
	    }

	    	$note           = New Note();
            $note->title    = Input::get('title');
            $note->body     = Input::get('body');

            $note->save();

            return Redirect::to('/backend/notes')->withInput()->with('success', 'note added');
    }
}
