<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePriceTypeRequest;
use App\Http\Requests\UpdatePriceTypeRequest;
use App\Models\PriceType;
use Illuminate\Http\Request;

class PriceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pricetypes = PriceType::all();

        return view('admin.pricetypes.index', compact('pricetypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pricetypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePriceTypeRequest $request)
    {
        $pricetypes = new PriceType();
        $pricetypes->name = $request->name;
        $pricetypes->save();

        return redirect()->route('pricetypes.index')->with('message', 'Pricetype succesvol aangemaakt!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PriceType  $pricetype
     * @return \Illuminate\Http\Response
     */
    public function show(PriceType $pricetype)
    {
        return view('admin.pricetypes.show', compact('pricetype'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PriceType  $pricetype
     * @return \Illuminate\Http\Response
     */
    public function edit(PriceType $pricetype)
    {
        return view('admin.pricetypes.edit', compact('pricetype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PriceType  $pricetype
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePriceTypeRequest $request, PriceType $pricetype)
    {
        $pricetype->name = $request->name;
        $pricetype->save();

        return redirect()->route('pricetype.index')->with('message', 'Pricetype succesvol geupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PriceType  $pricetype
     * @return \Illuminate\Http\Response
     */
    public function delete(PriceType $pricetype)
    {
        return view('admin.pricetypes.delete', compact('pricetype'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PriceType  $pricetype
     * @return \Illuminate\Http\Response
     */
    public function destroy(PriceType $pricetype)
    {
        $pricetype->delete();
        return redirect()->route('pricetypes.index')->with('message', 'Pricetype succesvol verwijderd!');
    }
}
