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
                'type' => $present->type,
                'updated_at' => $present->updated_at
            ];
        }
    
        return view('dashboard.present', [
            'title' => 'Present | SI DAMAR',
            'eventData' => $eventData
        ]);
    }
    
    function presentColorClass($type)
    {
    switch ($type) {
        case 'Hadir':
            return [
                'color' => 'text-white bg-green-500 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800',
                'hover' => 'hover:bg-green-600 hover:text-white focus:ring-green-200',
                'fill' => 'stroke-green-500',
            ];
        case 'Sakit':
            return [
                'color' => 'text-white bg-blue-500 focus:outline-none focus:ring-4 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800',
                'hover' => 'hover:text-white hover:bg-blue-800 focus:blue-300 focus:ring-blue-300',
                'fill' => 'stroke-blue-500',
            ];
        case 'Izin':
            return [
                'color' => 'text-white bg-blue-500 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-blue-500 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:focus:ring-yellow-900',
                'hover' => 'hover:text-white hover:bg-blue-500 focus:ring-blue-500',
                'fill' => 'stroke-blue-500',
            ];
        case 'Tidak Hadir':
            return [
                'color' => 'text-white bg-red-500 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900',
                'hover' => 'hover:text-white hover:bg-red-700 focus:ring-red-300',
                'fill' => 'stroke-red-500',
            ];
        default:
            return [
                'color' => 'bg-white border border-gray-300 focus:outline-none focus:ring-4 font-medium rounded-full text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700',
                'hover' => '',
                'fill' => '',
            ];
        }
    }
}
