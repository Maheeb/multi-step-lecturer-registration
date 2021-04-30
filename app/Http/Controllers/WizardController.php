<?php

namespace App\Http\Controllers;

use App\User;
use App\UserInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WizardController extends Controller
{

    public function index()
    {
        return view('layouts');
    }

    public function store(Request $request)
    {
//        The following piece of code is for validation
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'nid' => 'required',
                'avatar' => 'image|mimes:png',
                'nid_first_part' => 'image|mimes:png',
                'nid_second_part' => 'image|mimes:png'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->nid = $request->nid;
        $user->address = $request->address;
        $user->blood_group = $request->blood_group;
        if ($request->hasFile('avatar')) {
            $avatar = time() . '.' . $request->avatar->getClientOriginalExtension();
            $user->avatar = "images/avatars/{$avatar}";
            $request->avatar->move(public_path('images/avatars/'), $avatar);
        }
        if ($request->hasFile('nid_first_part')) {
            $nid_first_part = time() . '.' . $request->nid_first_part->getClientOriginalExtension();
            $user->nid_first_part = "images/nid_first_part/{$nid_first_part}";
            $request->nid_first_part->move(public_path('images/nid_first_part/'), $nid_first_part);
        }

        if ($request->hasFile('nid_second_part')) {
            $nid_second_part = time() . '.' . $request->nid_second_part->getClientOriginalExtension();
            $user->nid_second_part = "images/nid_second_part/{$nid_second_part}";
            $request->nid_second_part->move(public_path('images/nid_second_part/'), $nid_second_part);
        }


        $userStore = $user->save();

        if ($userStore) {

            $userInformation = new UserInformation();

            $userInformation->user_id = $user->id;
            $userInformation->educations = $request->educations;
            $userInformation->experiences = $request->experiences;
            $userInformation->publications = $request->publications;

            $userInformation->save();

        }

        return response()->json([
            'user' => $user
        ]);
//        dd($request->jobs, $request->education);
//        dd($request->jobs);
//        $data = json_decode($request->jobs, TRUE);
//        $test = json_encode($data);
//        dd($request->file('picture'));
    }


    public function getAllUsers()
    {
        $users = User::latest()->get();
        return response()->json($users);
    }

}
