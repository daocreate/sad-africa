<?php

namespace App\Http\Controllers\FrontEnd;

use App\Category;
use App\Formation;
use App\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;


class FrontController extends Controller
{
    public function index() //Request $request
    {
        $events = Event::all();
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

        //$s = $request->input('s');
        $categories = Category::latest()->take(3)->get();
        $formations = Formation::latest()->take(3)->get();
        return view("FrontEnd.layouts.frontEndBase", compact('formations','calendar', 'categories'));
    }
    public function lang($locale)
    {
        \App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }

    public function formations_index(Request $request){
        $events = Event::all();
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

        $s = $request->input('s');
        $formations = Formation::latest()
        ->search($s)->paginate(7);
        $categories = category::all();
        return view('FrontEnd.courses.courses_index', compact('formations', 'categories', 's', 'calendar'));
    }
    
}
