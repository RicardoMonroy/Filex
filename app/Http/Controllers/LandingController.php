<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        \Stripe\Stripe::setApiKey(
            'sk_test_51Hfv21KYWi6uPg51VXmXk412Gi5xPSw2rFT972JdPkLxvWuvV9bpOzfP8f1m4zwWDWlecLKzeNOIkkz04zDPf0xG00fKN1WTlS'
          );
          $plans = \Stripe\Plan::all();

        // dd($plans);

        return view('welcome', ['plans' => $plans]);
    }
}
