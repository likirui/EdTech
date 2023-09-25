<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParentController extends Controller
{
    public function dashboard()
    {
        //return view('parent.dashboard');
          //return view('student.dashboard');
          $user = Auth::user();
          $role = $user->role;
          return view('parent.dashboard', compact('role'));
    }

    public function profile()
    {
        // Parent profile logic
    }
}


