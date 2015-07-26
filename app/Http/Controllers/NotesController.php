<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Note;
use App\Collection;
use App\User;
use Flash;
use Auth;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class NotesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $notes = Note::where('user_id', '=', Auth::User()->id)->get();
        return view('notes.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $collections = User::find(Auth::User()->id)->collections;
        return view('notes.create', compact('collections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store()
    {
        $rules = [
            'title' => 'required|min:2',
            'body_text' => 'required|min:5|max:10000',
            'is_public' => 'required'
        ];
        
        $validator = \Validator::make(Input::only('title', 'body_text', 'is_public'), $rules);
        
        if ($validator->fails())
        {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        
        $note = Note::create([
            'title' => Input::get('title'),
            'body_text' => $this->clear_tags(Input::get('body_text')),
            'is_public' => Input::get('is_public')
        ]);
        
        if (Input::get('collection') > 0)
        {
            $collection = Collection::find(Input::get('collection'));
            $collection->notes()->save($note);
        }
        
        $user = Auth::User();
        $user->notes()->save($note);
        
        $note->save();
        
        Flash::success('Note created!');
        return redirect()->route('notes.show', $note->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $note = Note::find($id);
        
        if (!$note->is_public)
        {
            if (!Auth::check())
            {
                return redirect()->route('login_path');
            }
            else if (Auth::User() != $note->user)
            {
                return view('layouts.unauthorized');
            }
        }
        
        return view('notes.show', compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $note = Note::find($id);
        $collections = User::find(Auth::User()->id)->collections;
        
        if ($note->is_public)
        {
            $is_public = 1;
        }
        else
        {
            $is_public = 0;
        }
        
        return view('notes.edit', compact('note', 'is_public', 'collections'));
        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $note = Note::find($id);
        
        $rules = [
            'title' => 'required|min:2',
            'body_text' => 'required|min:5|max:10000',
            'is_public' => 'required'
        ];
        
        if (Auth::User()->id != $note->user_id)
        {
            Flash::warning('You are not authorized to do that');
            return redirect()->route('home');
        }
        
        $validator = \Validator::make(Input::only('title', 'body_text', 'is_public'), $rules);
        
        if ($validator->fails())
        {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        
        $note->title = Input::get('title');
        $note->body_text = Input::get('body_text');
        $note->is_public = Input::get('is_public');
        $note->collection_id = null;
        
        if (Input::get('collection') > 0)
        {
            $collection = Collection::find(Input::get('collection'));
            $collection->notes()->save($note);
        }
        
        $note->save();
        
        Flash::info('Note Updated!');
        return redirect()->route('notes.show', $note->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $note = Note::find($id);

        if (Auth::User()->id != $note->user_id)
        {
            Flash::warning('You are not authorized to do that');
            return redirect()->route('home');
        }
        
        $note->delete();
        
        Flash::info('Note deleted!');
        return redirect()->route('notes.index');
    }
    
    public function clear_tags($str)
    {
        return strip_tags($str, '<code><span><div><label><a><br><p><b><i><del><strike><u><img><video><audio><iframe><object><embed><param><blockquote><mark><cite><small><ul><ol><li><hr><dl><dt><dd><sup><sub><big><pre><code><figure><figcaption><strong><em><table><tr><td><th><tbody><thead><tfoot><h1><h2><h3><h4><h5><h6>');
    }
}
