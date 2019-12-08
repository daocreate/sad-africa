<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    function __construct()
    {
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
        $categories = Category::orderBy('id','DESC')->get();
        return view('backend.categories.index', compact('categories'));
    }
    public function create()
    {
        return view('backend.categories.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=> 'required',
            'description'=> 'required',
        ]);
        $category = new Category($request->all());
        $category->save();

        //Get translate value
        $category_name = trans('dao_custum.event');
        $add  = trans('dao_custum.add');
        $successful  = trans('dao_custum.successful');

        return redirect()->route('categories.index')->with("success", "$category_name $add $successful");
    }

    public function edit($id)
    {

    }
    public function show($id)
    {

    }
    public function destroy($id)
    {

    }
}
