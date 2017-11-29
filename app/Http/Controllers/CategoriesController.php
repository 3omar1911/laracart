<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
        $categories = Category::all();

        if($categories) {
            return view('categories.index', ['categories' => $categories]);
        }

        return 'no categories to show';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        if(Auth::check()) {

            $userRole = Auth::user()->role->id;
            if($userRole == 1)
                return 'you must be an admin to create a category';

            return view('categories.create');
        } else {

            return view('users/login');
        }

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {


        $validateCat = $request->validate([
            'name' => 'required|unique:categories'
        ]);

        $newCat = Category::create([
            'name' => $request->input('name')
        ]);

        if($newCat)
            return 'category saved successfully';
        else
            return 'error while saving the category';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        
        $items = Category::where('id', $id)->get()[0]->items;
        
        return view('categories.show', ['items' => $items]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        
        return view('categories.edit', ['id' => $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        
        $validateCat = $request->validate([
            'name' => 'required|unique:categories'
        ]);

        $newCat = Category::where('id', $id)
        ->update([
            'name' => $request->input('name')
        ]);

        if($newCat)
            return 'category name updated successfully';
        else
            return 'error while updating the category name';
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
