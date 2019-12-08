<?php

namespace App\Http\Controllers\BackEnd;

use App\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use MaddHatter\LaravelFullcalendar\Calendar;
use MercurySeries\Flashy\Flashy;


class EventController extends Controller
{
    /*function __construct()
    {
        $this->middleware('permission:event-list');
    }*/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event_name = trans('dao_custum.event');
        $all    = trans('dao_custum.all');
        $list = trans('dao_custum.list');

        $events = Event::orderBy('id','DESC')->get();
        $event = [];
        foreach ($events as $row){
            $enddate = $row->end_date."24:00:00";
            $event[]= \Calendar::event(
                $row->title,
                false,
                new \DateTime($row->start_date),
                new \DateTime($row->end_date),
                $row->id,
                [
                    'color' => $row->color,
                ]
            );
        }
        $calendar = \Calendar::addEvents($event);
        flashy()->success("$list $all $event_name ");
        return view('backend.events.index', compact('events', 'calendar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $event_name = trans('custum.event');
        $add  = trans('custum.add');
        Flashy::info("$add $event_name");
        return view('backend.events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Get translate value
        $event_name = trans('dao_custum.event');
        $add  = trans('dao_custum.add');
        $successful  = trans('dao_custum.successful');

        /*$validatation = Validator::make($request->all(), [
            'title'=> 'required',
            'color'=> 'required',
            'start_date'=> 'required',
            'end_date'=> 'required',
        ] );
        if ($validatation->fails()){
            flashy()->error('Please Insert Value');
            Flashy::error(" $please_insert_value ");
            return back();
        }*/
        $this->validate($request, [
            'title'=> 'required',
            'color'=> 'required',
            'description'=> 'required',
            'start_date'=> 'required',
            'end_date'=> 'required',
        ]);

        $event = new Event($request->all());
        $event->save();
        return redirect()->route('events.index')->with("success", "$event_name $add $successful");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);
        return view('backend.events.show')->with('event', $event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        return view('BackEnd.events.edit', compact('event', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, event $event)
    {
        $event_name = trans('custum.event');
        $update  = trans('custum.update');
        $successful  = trans('custum.successful');
        $this->validate($request, [
            'title'=> 'required',
            'color'=> 'required',
            'description'=> 'required',
            'start_date'=> 'required',
            'end_date'=> 'required',
        ]);
        $title = $request->input('title');
        $event->update($request->all());
        Flashy::success("$event_name : $title  $update $successful");
        return redirect()->route('events.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(event $event)
    {
        //get Translate Resources
        $event_name = trans('dao_custum.event');
        $delete  = trans('dao_custum.delete');
        $successful  = trans('custum.successful');

        $event->delete();
        return redirect()->route('events.index')->with("delete", "$event_name $delete $successful");
    }
}