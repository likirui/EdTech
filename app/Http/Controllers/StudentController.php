<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class StudentController extends Controller
{
    public function dashboard()
    {
        //return view('student.dashboard');
        $user = Auth::user();
        $role = $user->role;
        return view('student.dashboard', compact('role'));
    }

    public function profile()
    {
        // Student profile logic
    }

}
