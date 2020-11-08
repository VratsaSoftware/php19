<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{
    public function index()
    {
    	$events = Event::all();

    	return view('events.index', compact('events'));
    }

    public function show( Event $event )
    {
    	$event = Event::find( $event )->first();

    	return view('events.show', compact('event'));
    }

    public function add_comment_to_event( Event $event, Request $request )
    {
    	$event->comments()->create(['body' => $request->body,
								'user_id' => Auth::user()->id,				
            					'commentable_id' => $event->id,
            					'commentable_type' =>get_class($event)]
            				);
    	return redirect()->back()
    		->with('messge', 'Comment added!');

    }
}
