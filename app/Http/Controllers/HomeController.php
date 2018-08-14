<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    
    public function setRole(Request $request)
    {
        $role = Role::where('role_code','=', $request->input('my_role') )->first();
        \Session::put('active_role' , $role);
        \Session::save();

        return redirect('/home');
    }
}
