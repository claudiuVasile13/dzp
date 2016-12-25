<?php

namespace App\Http\Controllers\Backend;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;

class AdminPanelController extends Controller
{

    public function dashboardPage(Request $request)
    {
        return view('backend.dashboard');
    }

    public function usersPage(Request $request)
    {
        $users = User::paginate(10);
        return view('backend.users', compact('users'));
    }

}
