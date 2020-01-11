<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AvatarController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gender = 1;
        $avatars = auth()->user()->getMedia('avatar');
        //$user = User::find(auth()->user()->getAuthIdentifier());
        return view('frontend.profile', compact('avatars', 'gender') ,['user' => auth()->user()] );
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
        $this->validate($request, [
            'name' => 'required',
            'phone_number' => 'required|min:9|numeric',
            'birth_date' => 'required',
            'gender' => 'required',
            'avatar'=> 'required',
            'birth_place' => 'required'
        ]);

        $user = auth()->user();

        $user->name = request()->input('name');
        $user->phone_number = request()->input('phone_number');
        $user->birth_date = request()->input('birth_date');
        $user->gender = request()->input('gender');
        $user->birth_place = $request->input('birth_place');
        //$user->password = bcrypt($request['password']);
        $user->save();


        $user->addMedia($request->avatar)->toMediaCollection('avatar');


        return redirect()->back()->with('success', 'update successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
