<?php

namespace App\Http\Controllers\BackEnd;

use App\Category;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Formation;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:formation-list');
        $this->middleware('permission:formation-create', ['only' => ['create','store']]);
        $this->middleware('permission:formation-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:formation-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $formations = Formation::orderBy('id','DESC')->get();
        return view('backend.formations.index', compact('formations'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formers = user::role('former')->get();
        $categories = category::all();
        return view('backend.formations.create', compact('formers', 'categories')); //->with('formers', 'categories')
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'code' => 'required',
            'label' => 'required',
            'length' =>'required',
            'category_id' => 'required',
            'user_id' => 'required',
            'former_id' => 'required',
            'description' => 'required',
        ]);

        //Populate model
        $formation = new Formation($request->except(['image']));
        $formation->save();
        $formation->addMedia($request->image)->toMediaCollection('formation');
        //Store Image
        //formation::create($request->all());
        return redirect()->route('formations.index')->with('success', 'formations created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function show(formation $formation)
    {
        return view('backend.formations.show',compact('formation'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function edit(formation $formation)
    {
        return view('backend.formations.edit',compact('formation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, formation $formation)
    {
        request()->validate([
            'code' => 'required',
            'label' => 'required',
            'length' =>'required',
            'category_id' => 'required',
            'user_id' => 'required',
            'former_id' => 'required',
            'description' => 'required',
        ]);

        $formation->update($request->all());
        return redirect()->route('formations.index')->with('success','formations updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\formation  $formation
     * @return \Illuminate\Http\Response
     */
    public function destroy(formation $formation)
    {
        $formation->delete();

        return redirect()->route('formations.index')->with('success','formations deleted successfully');
    }
}
