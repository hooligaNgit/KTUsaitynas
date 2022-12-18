<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBoxGiftRequest;
use App\Http\Requests\UpdateBoxGiftRequest;
use App\Models\BoxGift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BoxGiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view(Request $request)
    {
        $url = 'http://127.0.0.1:8000/api/boxes/' .+ $request->id;
        $response = Http::get($url);
        if ($response->successful()) {
            $data = $response->json()["data"];
        }
        return view('boxGift.index',['data' =>$data]);
    }

    public function save(Request $request)
    {
        $box = new BoxGift();
        $box -> gift_id = $request -> name;
        $box -> box_id = $request -> id;
        $box -> save();
        return back()->with('success', 'Data has been added');
    }

    public function delete($gift_id, $box_id)
    {
        $gift = BoxGift::where([["gift_id", $gift_id],["box_id",$box_id]])->limit(1)->delete();
        $url = 'boxes/boxGifts/'.+$box_id;
        return redirect($url);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $url = 'http://127.0.0.1:8000/api/boxes/' .+ $request->id;
        $response = Http::get("http://127.0.0.1:8000/api/gifts");
        $responseBox = Http::get($url);

        if ($response->successful() and $responseBox->successful()){
            $data = $response->json()["data"];
            $dataBox = $responseBox->json()["data"];
        }
        return view('boxgift.create',['data' =>$data, 'dataBox' => $dataBox]);
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
