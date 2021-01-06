<?php

namespace App\Http\Controllers;

use App\Contract;
use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $files = File::whereUserId(Auth::user()->id)->OrderBy('id', 'desc')->get();

        $contracts = Contract::where('owner_id', Auth::user()->id)
            ->orWhere('guest_id', Auth::user()->id)
            ->get();

        return view('dashboard', compact('files', 'contracts'));
    }
}
