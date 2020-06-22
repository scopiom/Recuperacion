<?php

namespace App\Http\Controllers;

use App\Subscriber;
use App\Content;
use App\Section;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::all();
        $contents = Content::all()->where('status', '=', 'TRUE');
        return view('anonymous.contents', compact('contents', 'sections'));
    }
    public function homedetails(Content $content)
    {
        //$reasons = Message::all();
        $sections = Section::all();
        return view('anonymous.details', compact('content', 'sections'));
    }
    public function homesuscription(Request $request, $id)
    {
        $content = Content::find($id);
        $subs = new Subscriber();
        $subs->fill($request->all());
        $subs->content_id = $content->id;
        $subs->save();
        return redirect('/')->with('success','Te haz suscrito al contenido');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function show(Subscriber $subscriber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscriber $subscriber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscriber $subscriber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscriber $subscriber)
    {
        //
    }
}
