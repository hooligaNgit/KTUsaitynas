<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBoxGiftRequest;
use App\Http\Requests\UpdateBoxGiftRequest;
use App\Models\BoxGift;

class BoxGiftController extends Controller
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
     * @param  \App\Http\Requests\StoreBoxGiftRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBoxGiftRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BoxGift  $boxGift
     * @return \Illuminate\Http\Response
     */
    public function show(BoxGift $boxGift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BoxGift  $boxGift
     * @return \Illuminate\Http\Response
     */
    public function edit(BoxGift $boxGift)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBoxGiftRequest  $request
     * @param  \App\Models\BoxGift  $boxGift
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBoxGiftRequest $request, BoxGift $boxGift)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BoxGift  $boxGift
     * @return \Illuminate\Http\Response
     */
    public function destroy(BoxGift $boxGift)
    {
        //
    }
}
