<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGiftRequest;
use App\Http\Requests\UpdateGiftRequest;
use App\Models\Gift;
use App\Http\Resources\GiftsResource;
use App\Http\Requests\GiftsRequest;
class GiftsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        $data = Gift::paginate(10);
        return view('gifts.index', ['data'=>$data]);
    }

    public function index()
    {
        return GiftsResource::collection(Gift::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gifts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGiftRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GiftsRequest $request)
    {
        $gift = Gift::create([
            'name'=>$request->input('name'),
            'units_owned'=>$request->input('units_owned'),
            'unit_price'=>$request->input('unit_price'),
            'type_id'=>$request->input('type_id')
        ]);
        return new GiftsResource($gift);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gift  $gift
     * @return \Illuminate\Http\Response
     */
    public function show(Gift $gift)
    {
        return new GiftsResource($gift);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gift  $gift
     * @return \Illuminate\Http\Response
     */
    public function edit(Gift $gift)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGiftRequest  $request
     * @param  \App\Models\Gift  $gift
     * @return \Illuminate\Http\Response
     */
    public function update(GiftsRequest $request, Gift $gift)
    {
        $gift->update([
            'name'=>$request->input('name'),
            'units_owned'=>$request->input('units_owned'),
            'unit_price'=>$request->input('unit_price'),
            'type_id'=>$request->input('type_id')
        ]);
        return new GiftsResource($gift);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gift  $gift
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gift $gift)
    {
        $gift->delete();
        return response(null, 204);
    }
}
