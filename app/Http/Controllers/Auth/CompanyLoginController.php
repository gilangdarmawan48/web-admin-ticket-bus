<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:company', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
        return view('auth.company_login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        
        if(Auth::guard('company')->attempt($credentials))
        {
            return redirect()->intended(route('company.dashboard'));
        }

        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('company')->logout();
        return redirect('/company');
    }

}
