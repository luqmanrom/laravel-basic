<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use \App\User;
use \Auth;
use \Response;

class UserController extends Controller
{
    public function create(Request $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->age = $request->age;
        $user->password = App('hash')->make($request->password);
        $user->api_token = str_random(60);

        $user->save();
    }


    public function index()
    {
        return User::all();
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            $returnData = [
                'status' => 'Success',
                'token' => Auth::user()->api_token
            ];

            return Response::json($returnData, 200);
        } else
        {
            return Response::json('Permission denied', 400);
        }
    }
}
