<?php

namespace App\Http\Controllers\API;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        /*проверка валидация*/

        $this->validate($request, [

            'password' => ['required', 'string', 'min:8'],
            'phone_number'=>['required', 'string'],
            'email'=> 'nullable',
        ]);

        if ($this->attemptLogin($request)) {
            $user = $this->guard()->user();
            $user->generateToken();

            return response()->json([
                'data' => $user->toArray(),
            ]);
        }

        return $this->sendFailedLoginResponse($request);
    }

    protected function register(Request $request)
    {
        /*проверка валидация*/

        $this->validate($request, [

            'name' => ['nullable', 'string', 'max:255'],
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
            'is_admin' => 0,
        ]);

        $user = User::select('api_token','id', 'name', 'phone_number', 'balance')->get()->last();
        return response()->json(['new_user' => $user],'200');
    }
}
