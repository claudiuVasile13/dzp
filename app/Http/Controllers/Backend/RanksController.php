<?php

namespace App\Http\Controllers\Backend;

use App\Rank;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class RanksController extends Controller
{

    public function ranksPage(Request $request)
    {
        $ranks = Rank::all();
        return view('backend.ranks', compact('ranks'));
    }

    public function editRankPage(Request $request, $rank_id)
    {
        $rank = Rank::find($rank_id);
        if(count($rank)) {
            return view('backend.edit-rank', compact('rank'));
        } else {
            return Redirect::to('/admin-panel/ranks')
                ->with('RankDoesNotExist', 'The rank that you want to edit does not exist.');
        }
    }

}
