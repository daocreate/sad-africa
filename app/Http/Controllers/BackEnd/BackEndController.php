<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BackEndController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('backend.index');
    }
}
