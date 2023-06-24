<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Present;
use App\Models\PresentType;
use Illuminate\Http\Request;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePresentRequest;
use App\Http\Requests\UpdatePresentRequest;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PresentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $events = Event::withCount('attendees')->get();
        $events = Event::withCount('attendees')
            ->orderBy('date')
            ->get();
        $presents = Present::all();
        $users = User::all();

    return view('dashboard.admin.present.index', compact('events', 'users', 'presents'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePresentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePresentRequest $request, Event $event)
    {
    // Get the url
    $url = $request->url();

    // Get the id of Event from url
    $event_id = substr($url, strrpos($url, '/') + 1);

    //get type t from url parameter
    $t = $request->t;

    // Get the user id of from url
    $user_id = $request->u;

    // Check if the record with the specified event and user id exists
    $present = Present::where('event_id', $event_id)
                      ->where('user_id', $user_id)
                      ->first();

    // If the record exists, update it. Otherwise, create a new one.
    if ($present) {
        $present->update([
            'type' => $t
        ]);
    } else {
        Present::create([
            'event_id' => $event_id,
            'user_id' => $user_id,
            'type' => $t
        ]);
    }

    // Redirect to the previous page
    return redirect()->back();
}


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Present  $present
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::findorfail($id);
        $users = User::all();

        // Retrieve the presents for the specified event and users
        $presents = Present::where('event_id', $id)->whereIn('user_id', $users->pluck('id'))->get();
    
        return view('dashboard.admin.present.show', compact('event', 'users', 'presents'));

        return redirect();
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Present  $present
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $present = Present::findorfail($id);
        $event = Event::findorfail($id);
        $users = User::all();
        return view('dashboard.admin.present.edit', compact('type', 'event', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePresentRequest  $request
     * @param  \App\Models\Present  $present
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(UpdatePresentRequest $request, Present $present)
    public function update(Request $request, $id)
    {
                // Get the url
                $url = $request->url();

                // Get the id of Event from url
                $event = substr($url, strrpos($url, '/') + 1);
        
                //get type t from url parameter
                $t = $request->t;
        
                // Get the user id of  from url
                $user = $request->u;

                $present_data = [
                    'event_id' => $event,
                    'user_id' => $user,
                    'type' => $t
                ];
        
                // Create update present 
                Present::where('id', $id)->update($present_data);
          
              // Redirect to the previous page
            //   return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Present  $present
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id, string $user)
    {
    // Delete the record(s) where event_id = $id and user_id = $user
    Present::where('event_id', $id)
           ->where('user_id', $user)
           ->delete();

    // Redirect to the previous page
    return redirect()->back();
    }





}
