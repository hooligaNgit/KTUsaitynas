<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreboxRequest;
use App\Http\Requests\UpdateboxRequest;
use App\Models\box;
use App\Http\Resources\BoxResource;
use App\Http\Requests\BoxesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BoxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        $response = Http::get("http://127.0.0.1:8000/api/boxes");

        if ($response->successful()) {
            $data = $response->json()["data"];
        }
        return view('box.index',['data' =>$data]);
    }
    public function delete(Request $request)
    {
        $url = 'http://127.0.0.1:8000/api/boxes/' .+ $request->id;
        $response = Http::delete($url);
        return redirect("/boxes");
    }
    public function index()
    {
        return BoxResource::collection(Box::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        $response = Http::post('http://127.0.0.1:8000/api/boxes', [
            'name' => $request->name,
            'status' => $request->status,
            'dispatch_date' => $request->dispatch_date,
            'delivery_date' => $request->delivery_date
        ]);
        return back()->with('success', 'Data has been added');
    }
    public function editBox(Request $request)
    {
        $url = 'http://127.0.0.1:8000/api/boxes/' .+ $request->id;
        $response = Http::get($url);
        if ($response->successful()) {
            $data = $response->json()["data"];
        }
        return view('box.edit',['data' =>$data]);
    }
    public function updateBox(Request $request)
    {
        $url = 'http://127.0.0.1:8000/api/boxes/' .+ $request->id;
        $response = Http::put($url, [
            'name' => $request->name,
            'status' => $request->status,
            'dispatch_date' => $request->dispatch_date,
            'delivery_date' => $request->delivery_date
        ]);
        return redirect("/boxes");
    }
    public function create()
    {
        return view('box.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreboxRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BoxesRequest $request)
    {
        $box = Box::create([
            'name'=>$request->input('name'),
            'status'=>$request->input('status'),
            'dispatch_date'=>$request->input('dispatch_date'),
            'delivery_date'=>$request->input('delivery_date')
        ]);
        return new BoxResource($box);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\box  $box
     * @return \Illuminate\Http\Response
     */
    public function show(box $box)
    {
        return new BoxResource($box);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\box  $box
     * @return \Illuminate\Http\Response
     */
    public function edit(box $box)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateboxRequest  $request
     * @param  \App\Models\box  $box
     * @return \Illuminate\Http\Response
     */
    public function update(BoxesRequest $request, box $box)
    {
        $box->update([
            'name'=>$request->input('name'),
            'status'=>$request->input('status'),
            'dispatch_date'=>$request->input('dispatch_date'),
            'delivery_date'=>$request->input('delivery_date')
        ]);
        return new BoxResource($box);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\box  $box
     * @return \Illuminate\Http\Response
     */
    public function destroy(box $box)
    {
        $box->delete();
        return response(null, 204);
    }
}
