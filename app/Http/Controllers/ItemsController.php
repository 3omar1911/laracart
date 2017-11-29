<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Item;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        
        $categories = Category::all();
        return view('items.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        //print_r($request->input('catName'));
        //return;
        $validateItem = $request->validate([
            'name' => 'required|unique:items',
            'catName' => 'required',
            'price' => 'required',
            'img' => 'required'

        ]);

        $imgName = null;
        if($request->hasFile('img')) {

            $dest = 'public/items';
            $path = $request->img->storeAs($dest, $request->img->getClientOriginalName());
            if($path) {

                $imgName = $request->img->getClientOriginalName();
            }
            //return view('test', [ 'filename' => $request->img->getClientOriginalName() ]);
        }


        //$categories = Category::whereIn('id',$request->input('catName'))
        //->get();
        
        $item = Item::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            //'categories' => $categories,
            'img' => $imgName
        ]);


        //return $request->input('catName');
        $item->categories()->attach($request->input('catName'));

        return 'item added successfully';
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
