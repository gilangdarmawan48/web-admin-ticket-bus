<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ApiCompanyLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:company-api', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
        return view('auth.company_login');
    }

    public function login(Request $request)
    {
        // $this->validate($request, [
        //     'email' => 'required|email',
        //     'password' => 'required|min:6'
        // ]);

        // $credentials = [
        //     'email' => $request->email,
        //     'password' => $request->password
        // ];

        $credentials = request(['email', 'password']);
        
        if(! $token = auth()->guard('company-api')->attempt($credentials))
        {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->respondWithToken($token);
        // return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('company-api')->logout();
        // return redirect('/company');
        return response()->json(['message' => 'Successfully logged out']);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->guard('company-api')->factory()->getTTL() * 60
        ]);
    }

}
