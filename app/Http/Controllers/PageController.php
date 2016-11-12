<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class PageController extends Controller
{
    function app() {
        $user = Auth::user();
        return redirect("/app/{$user->team->slug}");
    }
}
