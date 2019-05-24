<?php

namespace App\Http\Controllers;

use App\Users;
use Validator;
use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use Redirect, Response;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Users::paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        $user = Users::create($request->all());
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersRequest $request, $id)
    {
        $id = $id === 'false' ? $request->id : $id;
        $user = Users::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->role = $request->role;
        $user->save();
        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request, $id)
    {
        $id = $id === 'false' ? $request->id : $id;
        $user = Users::find($id)->delete();
        return response()->json($user);
    }

}
