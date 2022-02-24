<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePricetypeRequest;
use App\Http\Requests\UpdatePricetypeRequest;
use App\Models\Pricetype;
use Illuminate\Http\Request;

class PricetypeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:index pricetype', ['only' => ['index']]);
        $this->middleware('permission:show pricetype', ['only' => ['show']]);
        $this->middleware('permission:create pricetype', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit pricetype', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete pricetype', ['only' => ['delete', 'destroy']]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pricetypes = Pricetype::all();

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
    public function store(StorePricetypeRequest $request)
    {
        $pricetypes = new Pricetype();
        $pricetypes->name = $request->name;
        $pricetypes->save();

        return redirect()->route('pricetypes.index')->with('message', 'Pricetype succesvol aangemaakt!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pricetype  $pricetype
     * @return \Illuminate\Http\Response
     */
    public function show(Pricetype $pricetype)
    {
        return view('admin.pricetypes.show', compact('pricetype'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pricetype  $pricetype
     * @return \Illuminate\Http\Response
     */
    public function edit(Pricetype $pricetype)
    {
        return view('admin.pricetypes.edit', compact('pricetype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pricetype  $pricetype
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePricetypeRequest $request, Pricetype $pricetype)
    {
        $pricetype->name = $request->name;
        $pricetype->save();

        return redirect()->route('pricetypes.index')->with('message', 'Pricetype succesvol geupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pricetype  $pricetype
     * @return \Illuminate\Http\Response
     */
    public function delete(Pricetype $pricetype)
    {
        return view('admin.pricetypes.delete', compact('pricetype'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pricetype  $pricetype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pricetype $pricetype)
    {
        $pricetype->delete();
        return redirect()->route('pricetypes.index')->with('message', 'Pricetype succesvol verwijderd!');
    }
}
