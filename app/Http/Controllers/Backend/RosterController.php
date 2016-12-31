<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RosterController extends Controller
{

    public function rosterPage(Request $request)
    {
        return view('backend.roster', compact(''));
    }

}
