<?php

namespace App\Http\Controllers\API;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    protected function register(Request $request)
    {
        /*проверка валидация*/

        $this->validate($request, [

            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone_number'=>['required', 'string', 'unique:users'],
            'email'=>'nullable',
        ]);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'phone_number' => $request['phone_number'],
            'api_token' => Str::random(60),
            'balance' => 0,
        ]);

        $user = User::select('api_token','id', 'name', 'phone_number', 'balance')->get()->last();
        return response()->json(['new_user' => $user],'200');
    }
}
