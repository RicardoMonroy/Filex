<?php

namespace App\Http\Controllers;

use App\Contract;
use App\File;
use App\Plans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function index()
    {
        $files = File::whereUserId(Auth::user()->id)->OrderBy('id', 'desc')->get();
        $contracts = Contract::where('owner_id', Auth::user()->id)
            ->orWhere('signer_two_mail', Auth::user()->email)
            ->get();
        $plans = Plans::get();
        // dd($plans);

        return view('subscriptions.plans', compact('plans', 'files', 'contracts'));
    }
}
