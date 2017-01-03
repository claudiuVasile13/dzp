<?php

namespace App\Http\Controllers\Backend;

use App\Rank;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RanksController extends Controller
{

    public function ranksPage(Request $request)
    {
        $ranks = Rank::all();
        return view('backend.ranks', compact('ranks'));
    }

}
