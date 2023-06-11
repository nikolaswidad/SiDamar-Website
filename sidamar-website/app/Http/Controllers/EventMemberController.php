<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Present;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EventMemberController extends Controller
{
    public function index()
    {
        // $events = Event::all();
        return view('dashboard.event',[
            "events" => Event::all()->sortBy('date'),
        ]);
    }

    public function showCalendar($year, $month)
    {
        $startOfMonth = Carbon::create($year, $month, 1)->startOfMonth();
        $endOfMonth = Carbon::create($year, $month, 1)->endOfMonth();

        $events = Event::whereBetween('date', [$startOfMonth, $endOfMonth])->get();

        return view('calendar', compact('year', 'month', 'events'));
    }

    public function sortByDesc()
    {
        
    }
}
