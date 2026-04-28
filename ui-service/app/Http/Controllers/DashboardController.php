<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = session('user');
        return view('dashboard.index', compact('user'));
    }
}