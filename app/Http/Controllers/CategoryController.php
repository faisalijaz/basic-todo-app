<?php

namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * categoriesController constructor.
     */
    public function __construct()
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
        $categories = Categories::all();

        return view('category.index', [
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make((array)$request->all(), [
            'category_name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/category/create')
                ->withInput()
                ->withErrors($validator);
        }


        $category = new Categories();

        $category->name = $request->category_name;
        $category->display_name = $request->display_name;
        $category->description = $request->description;

        $category->save();

        return redirect('/category');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Categories::findorfail($id);

        return view('category.show', [
            'category' => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Categories::find($id);

        return view('category.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make((array)$request->all(), [
            'category_name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("/category/edit/$id")
                ->withInput()
                ->withErrors($validator);
        }


        $category = Categories::where('id', $id)->first();

        $category->name = $request->category_name;
        $category->display_name = $request->display_name;
        $category->description = $request->description;
        $category->is_active = $request->is_active;

        $category->save();

        return redirect('/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Categories::findOrFail($id)->delete();

        return redirect('/category');
    }
}
