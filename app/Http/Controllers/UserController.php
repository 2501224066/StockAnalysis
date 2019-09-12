<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $this->verify($request,[
            'phone' =>'required',
            'code' => 'required'
        ]);

        
    }
}