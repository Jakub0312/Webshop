<?php

namespace App\Http\Controllers;

use App\Models\Levorder;
use App\Http\Requests\StoreLevorderRequest;
use App\Http\Requests\UpdateLevorderRequest;

class LevorderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreLevorderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLevorderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Levorder  $levOrder
     * @return \Illuminate\Http\Response
     */
    public function show(Levorder $levOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Levorder  $levOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(Levorder $levOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLevorderRequest  $request
     * @param  \App\Models\Levorder  $levOrder
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLevorderRequest $request, Levorder $levOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Levorder  $levOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Levorder $levOrder)
    {
        //
    }
}
