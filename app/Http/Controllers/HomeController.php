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
            ->orWhere('signer_two_mail', Auth::user()->email)
            ->get();
        $signeds = Signed::where('user_id', Auth::user()->id)->get();
        // dd($signeds);

        \Stripe\Stripe::setApiKey('sk_test_51Hfv21KYWi6uPg51VXmXk412Gi5xPSw2rFT972JdPkLxvWuvV9bpOzfP8f1m4zwWDWlecLKzeNOIkkz04zDPf0xG00fKN1WTlS');

        $products = \Stripe\Product::all();
        $clients = \Stripe\Customer::all();
        $price = \Stripe\Price::all();

        // dd($price);


        return view('dashboard', compact('files', 'contracts', 'signeds', 'products'));
    }
}

