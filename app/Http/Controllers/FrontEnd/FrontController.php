<?php

namespace App\Http\Controllers\FrontEnd;

use App\Category;
use App\Formation;
use App\Event;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;



class FrontController extends Controller
{
    public function index() //Request $request
    {
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

        $carbon = Carbon::now()->subMinutes(2)->diffForHumans();
        //$s = $request->input('s');
        $categories = Category::latest()->take(3)->get();
        $formations = Formation::latest()->take(3)->get();
        return view("frontend.layouts.frontEndBase", compact('formations','calendar', 'categories', 'events', 'carbon'));
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

        //$s = $request->input('s');
        $formations = Formation::all();
        //->search($s)->paginate(7);
        $categories = category::all();
        return view('frontend.courses.courses_index', compact('formations', 'categories', 'calendar')); //, 's'
    }
    
}
