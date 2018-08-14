<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

use App\User;
use Log;

class EmployeeController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('employee.list',['users' => $users]);
    }
}