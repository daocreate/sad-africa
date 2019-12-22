<?php

namespace App\Http\Controllers\FrontEnd;

use App\Inscription;
use App\User;
use DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LearnerController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $inscriptions = Inscription::orderBy('id','DESC')->get();
        return view('frontend.learner.dashboard', compact('inscriptions'));
    }
    /**
     * inscription to cources
     */
    public function inscription(Request $request){
        $lerner_id = Auth::id();
        $now = new DateTime('now');

        $inscription = new Inscription($request->all());
        $inscription->formation_id = $request->input('formation_id');
        $inscription->learner_id = $lerner_id;
        $inscription->date_inscription = $now;
        $inscription->save();
        return view('frontend.learner.dashboard')->with('success', 'Inscription réussit');
    }

}
