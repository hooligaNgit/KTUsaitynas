<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function register(Request $request)
    {
        $validated = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required',
            'repeat_password'=>'required|same:password'
        ]);
        if ($validated->fails())
        {
            return response() ->json($validated->errors(), 422);
        }
        $allData = $request->all();
        $allData['password'] = bcrypt($allData['password']);

        $user = User::create($allData);

        $resArr = [];
        $resArr['token'] =$user->createToken('api-application', ['client'])->accessToken;
        $resArr['name'] = $user->name;

        return response() ->json($resArr, 200);
    }


    public function login(Request $request)
    {
        if (Auth::attempt([
            'email'=>$request->email,
            'password' => $request->password
        ]))
        {
            $user = Auth::user();
            $resArr = [];
            $resArr['token'] =$user->createToken('api-application')->accessToken;
            $resArr['name'] = $user->name;
            return response() ->json($resArr, 200);
        }
        else
        {
            return response() ->json(['error'=>'Incorrect credentials'], 203);
        }
    }


    public function index()
    {
        return User::all();
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
