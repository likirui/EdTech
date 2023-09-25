<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function __construct()
    {
        $this->middleware('guest')->except('logout');


    }

    protected function authenticated(Request $request, $user)
    {
        // Check if the user's role is either "parent" or "student"
        if (!in_array($user->role, ['parent', 'student'])) {
            // The user doesn't have a valid role, so alert them and log them out.
            Auth::logout();
    
            return redirect()->route('login')->with('error', 'You do not have a valid role. Please contact support.');
        }
    
        if ($user->role === 'parent') {
            return redirect()->route('parent.dashboard');
        } elseif ($user->role === 'student') {
            return redirect()->route('student.dashboard');
        } else {
            // Default redirect for users with other roles
            return redirect($this->redirectTo);
        }
    }
}
