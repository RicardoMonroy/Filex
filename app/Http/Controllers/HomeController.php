<?php

namespace App\Http\Controllers;

use App\Contract;
use App\File;
use App\Signed;
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
        $signeds = Signed::where('user_id', Auth::user()->id)->get();
        // dd($signeds);

        return view('dashboard', compact('files', 'contracts', 'signeds'));
    }
}
