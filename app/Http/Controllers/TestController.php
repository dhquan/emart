<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function getForm(){
        return view('/');
    }
    public function handleRequest(Request $request){
        var_dump($request->all());
    }
}
