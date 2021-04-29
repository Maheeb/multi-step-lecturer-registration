<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class WizardController extends Controller
{

    public function index()
    {
        return view('layouts');
    }

    public function store(Request $request)
    {
        dd($request->all());

//        $user = new User();
//
//        $user->name = $request->name;
//        $user->email = $request->email;
//        $user->phone = $request->phone;
//        $user->NID = $request->NID;
//
//        $user->save();
//        dd($request->jobs, $request->education);
//        dd($request->jobs);
//        $data = json_decode($request->jobs, TRUE);
//        $test = json_encode($data);
//        dd($request->file('picture'));
    }

}
