<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGiftRequest;
use App\Http\Requests\UpdateGiftRequest;
use App\Models\Gift;
use App\Http\Resources\GiftsResource;
use App\Http\Requests\GiftsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class GiftsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
       $response = Http::get("http://127.0.0.1:8000/api/gifts");
       $responseTypes = Http::get("http://127.0.0.1:8000/api/types");

       if ($response->successful() and $responseTypes->successful()){
           $data = $response->json()["data"];
           $dataTypes = $responseTypes->json()["data"];
       }
       return view('gifts.index',['data' =>$data, 'dataTypes' => $dataTypes]);
    }
    public function delete(Request $request)
    {
        $url = 'http://127.0.0.1:8000/api/gifts/' .+ $request->id;
        $response = Http::delete($url);
        return redirect("/gifts");
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
        $response = Http::get("http://127.0.0.1:8000/api/types");

        if ($response->successful()){
            $data = $response->json()["data"];
        }
        return view('gifts.create',['data' =>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGiftRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        $response = Http::post('http://127.0.0.1:8000/api/gifts', [
            'name' => $request->name,
            'unit_price' => (int)$request->unit_price,
            'units_owned' => (int)$request->units_owned,
            'type_id' => (int)$request->type_id
        ]);
        return back()->with('success', 'Data has been added');
    }
    public function editGift(Request $request)
    {
        $url = 'http://127.0.0.1:8000/api/gifts/' .+ $request->id;
        $responseTypes = Http::get("http://127.0.0.1:8000/api/types");
        $response = Http::get($url);
        if ($response->successful()) {
            $dataTypes = $responseTypes->json()["data"];
            $data = $response->json()["data"];
        }
        return view('gifts.edit',['data' =>$data, 'dataTypes' => $dataTypes]);
    }
    public function updateGift(Request $request)
    {
        $url = 'http://127.0.0.1:8000/api/gifts/' .+ $request->id;
        $response = Http::put($url, [
            'name' => $request->name,
            'unit_price' => $request->unit_price,
            'units_owned' => (int)$request->units_owned,
            'type_id' => (int)$request->type_id
        ]);
        return redirect("/gifts");
    }

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
