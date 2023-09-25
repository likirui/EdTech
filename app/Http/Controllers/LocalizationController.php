<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
class LocalizationController extends Controller
{
    public function setLocale($locale)
    {
        // Check if the selected locale is supported
        if (in_array($locale, config('app.supported_locales'))) {
            // Set the application locale
            App::setLocale($locale);

            // Store the selected locale in the session
            Session::put('locale', $locale);
        }

        // Redirect back to the previous page or a default route
        return redirect()->back();
    }
}
