<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Inertia\Inertia;
use Illuminate\Support\Facades\Request;

class AdminEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Events/Index', [
            'filters' => Request::all('search'),
            'events' => Event::latest()->filter(
                Request::only('search')
            )->paginate(15)->withQueryString()
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Events/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'title' => 'required',
            'slug' => 'required',
            'thumbnail' => ['required','file', 'image', 'mimes:jpg,jpeg,png'],
            'body' => 'required',
            'deadline' => 'required'
        ]);
        request('thumbnail')->store('public/events');
        $uploadedFile = request()->file('thumbnail'); 

        $attributes['thumbnail'] = $uploadedFile->hashName();

        Event::create($attributes);

        return redirect('/admin/events');
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
        return Inertia::render('Events/Edit', ['event' => $event]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $attributes = request()->validate([
            'title' => 'required',
            'slug' => 'required',
            // 'thumbnail' => $event->exists ? ['image'] : ['required', 'image'],
            'body' => 'required',
            'deadline' => 'required'
        ]);
        // if($attributes['thumbnail'] ?? false) {
        //     $attributes['thumbnail'] = request()->file('thumbnail')->store('events/thumbnails');
        // }
        $event->update($attributes);

        return redirect('/admin/events');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect('/admin/events');
    }
}
