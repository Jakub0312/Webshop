<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductstateRequest;
use App\Http\Requests\UpdateProductstateRequest;
use App\Models\Productstate;
use Illuminate\Http\Request;

class ProductstateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * return \Illuminate\Http\Response
     */
    public function index()
    {
        $productstates = Productstate::all();

        return view('admin.productstates.index', compact('productstates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.productstates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * param  \Illuminate\Http\Request  $request
     * return \Illuminate\Http\Response
     */
    public function store(StoreProductstateRequest $request)
    {
        $productstates = new Productstate();
        $productstates->name = $request->name;
        $productstates->save();

        return redirect()->route('productstates.index')->with('message', 'Productstate succesvol aangemaakt!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Productstate  $productstate
     * return \Illuminate\Http\Response
     */
    public function show(Productstate $productstate)
    {
        return view('admin.productstates.show', compact('productstate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Productstate  $productstate
     * @return \Illuminate\Http\Response
     */
    public function edit(Productstate $productstate)
    {
        return view('admin.productstates.edit', compact('productstate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Productstate  $productstate
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductstateRequest $request, Productstate $productstate)
    {
        $productstate->name = $request->name;
        $productstate->save();

        return redirect()->route('productstates.index')->with('message', 'Productstate succesvol geupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Productstate  $productstate
     * @return \Illuminate\Http\Response
     */
    public function delete(Productstate $productstate)
    {
        return view('admin.productstates.delete', compact('productstate'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Productstate  $productstate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Productstate $productstate)
    {
        $productstate->delete();
        return redirect()->route('productstates.index')->with('message', 'Productstate succesvol verwijderd');
    }
}
