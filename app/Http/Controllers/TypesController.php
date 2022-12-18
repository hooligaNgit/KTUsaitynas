<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypesRequest;
use App\Models\Type;
use App\Http\Resources\TypesResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        $response = Http::get("http://127.0.0.1:8000/api/types");

        if ($response->successful()) {
            $data = $response->json()["data"];
        }
        return view('types.index',['data' =>$data]);
    }
    public function index()
    {
        return TypesResource::collection(Type::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('types.create');
    }

    public function save(Request $request)
    {
        $response = Http::post('http://127.0.0.1:8000/api/types', [
            'name' => $request->name
        ]);
        return back()->with('success', 'Data has been added');
    }
    public function delete(Request $request)
    {
        $url = 'http://127.0.0.1:8000/api/types/' .+ $request->id;
        $response = Http::delete($url);
        return redirect("/types");
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypesRequest $request)
    {
        $type = Type::create([
            'name'=>$request->input('name')
        ]);
        return new TypesResource($type);
    }

    public function editType(Request $request)
    {
        $url = 'http://127.0.0.1:8000/api/types/' .+ $request->id;
        $response = Http::get($url);
        if ($response->successful()) {
            $data = $response->json()["data"];
        }
        return view('types.edit',['data' =>$data]);
    }
    public function updateType(Request $request)
    {
        $url = 'http://127.0.0.1:8000/api/types/' .+ $request->id;
        $response = Http::put($url, [
            'name' => $request->name
        ]);
        return redirect("/types");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        return new TypesResource($type);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTypeRequest  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(TypesRequest $request, Type $type)
    {
        $type->update([
            'name'=>$request->input('name')
        ]);
        return new TypesResource($type);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return response(null, 204);
    }
}
