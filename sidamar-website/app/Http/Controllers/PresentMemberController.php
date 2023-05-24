<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Present;
use Illuminate\Http\Request;

class PresentMemberController extends Controller
{

    // public function show()
    // {
    //     $allPresent = Present::all();
    //     // Get user id
    //     $user = auth()->user()->id;

    //     // get events from $presents where $user
    //     $events = Event::whereIn('id', $allPresent->pluck('event_id'))->get();


    //     return view('dashboard.present', [
    //         'title' => 'Present | SI DAMAR',
    //         'events' => $events
    //     ]);
    // }

    public function show()
    {
        // Get user id
        $user = auth()->user()->id;
    
        // Get presents for the user
        $presentEvents = Present::where('user_id', $user)->get();
    
        // Get the event IDs from the presents
        $eventIds = $presentEvents->pluck('event_id')->toArray();
    
        // Get the events with titles based on the event IDs
        $events = Event::whereIn('id', $eventIds)->get(['id', 'title']);
    
        // Build an associative array with event titles and update dates
        $eventData = [];
        foreach ($presentEvents as $present) {
            $eventId = $present->event_id;
            $eventData[$eventId] = [
                'title' => $events->where('id', $eventId)->first()->title,
                'updated_at' => $present->updated_at
            ];
        }
    
        return view('dashboard.present', [
            'title' => 'Present | SI DAMAR',
            'eventData' => $eventData
        ]);
    }
        
}
