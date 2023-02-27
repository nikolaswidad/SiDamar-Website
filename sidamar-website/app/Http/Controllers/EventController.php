<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventCategory;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $events = Event::paginate(10);
        // return view('dashboard.admin.event.index',[
        //     "events" => Event::all(),
        // ]);
        $events = Event::paginate(10);
        return view('dashboard.admin.event.index',compact('events'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.event.create', [
            'categories' => EventCategory::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventRequest $request)
    {
        $validateData = $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'description' => 'required',
            'date' => 'required',
            'time' => 'required',
            'date_notification' => 'required',
            'location' => 'required',
            'url' => 'required'
        ]);

        $validateData['user_id'] = auth()->user()->id;
        // $validateData['excerpt'] = Str::limit(strip_tags($request->body), 200);
        
        Event::create($validateData);
        return redirect('/dashboard/events')->with('success','New event has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        // $categories = EventCategory::all();
        // $event = Event::findorfail($id);
        // return view('dashboard.admin.event.edit', compact('event','categories'));

        return view('dashboard.admin.event.edit', [
            'event' => $event,
            'categories' => EventCategory::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventRequest  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'description' => 'required',
            'date' => 'required',
            'time' => 'required',
            'date_notification' => 'required',
            'location' => 'required',
            'url' => 'required'
        ];

        $validateData = $request->validate($rules);

        $validateData['user_id'] = auth()->user()->id;

        Event::where('id',$event->id)->update($validateData);
        
        return redirect('/dashboard/events')->with('success','Event has been edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findorfail($id);
        $event->delete();
        
        return redirect('dashboard/events')->with('success','Data berhasil dihapus (silahkan cek trash can');
    }

    // nampilin data yang udah kehapus
    public function deleted(){
        $events = Event::onlyTrashed()->paginate(10);
        // $events = Event::onlyTrashed();
        // dd($events);
        return view('dashboard.admin.event.deleted', compact('events'));
    }

    
    //restore data yang sebelumnya kehapus
    public function restore($id){
        $events = Event::withTrashed()->where('id',$id)->first();
        $events->restore();

        return redirect('dashboard/events/')->with('success','Data berhasil dikembalikan');
    }

    //delete permanen
    public function kill($id){
        $event = Event::withTrashed()->where('id',$id)->first();
        $event->forceDelete();

        return redirect('dashboard/events/deleted')->with('success','Data berhasil dihapus permanen');
    }
}
