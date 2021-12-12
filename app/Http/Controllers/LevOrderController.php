<?php

namespace App\Http\Controllers;

use App\Models\LevOrder;
use App\Http\Requests\StoreLevOrderRequest;
use App\Http\Requests\UpdateLevOrderRequest;

class LevOrderController extends Controller
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
     * @param  \App\Http\Requests\StoreLevOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLevOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LevOrder  $levOrder
     * @return \Illuminate\Http\Response
     */
    public function show(LevOrder $levOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LevOrder  $levOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(LevOrder $levOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLevOrderRequest  $request
     * @param  \App\Models\LevOrder  $levOrder
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLevOrderRequest $request, LevOrder $levOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LevOrder  $levOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(LevOrder $levOrder)
    {
        //
    }
}
