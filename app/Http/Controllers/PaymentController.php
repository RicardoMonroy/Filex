<?php

namespace App\Http\Controllers;

use App\Contract;
use App\File;
use App\Plans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index()
    {
        \Stripe\Stripe::setApiKey('sk_test_51Hfv21KYWi6uPg51VXmXk412Gi5xPSw2rFT972JdPkLxvWuvV9bpOzfP8f1m4zwWDWlecLKzeNOIkkz04zDPf0xG00fKN1WTlS');

        header('Content-Type: application/json');

        $YOUR_DOMAIN = 'http://localhost:4242';

        $checkout_session = \Stripe\Checkout\Session::create([
        'payment_method_types' => ['card'],
        'line_items' => [[
            'price_data' => [
                'currency' => 'usd',
                'unit_amount' => 2000,
                'product_data' => [
                    'name' => 'Stubborn Attachments',
                    'images' => ["https://i.imgur.com/EHyR2nP.png"],
            ],
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',
        'success_url' => $YOUR_DOMAIN . '/success.html',
        'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
        ]);

        echo json_encode(['id' => $checkout_session->id]);

        // $files = File::whereUserId(Auth::user()->id)->OrderBy('id', 'desc')->get();
        // $contracts = Contract::where('owner_id', Auth::user()->id)
        //     ->orWhere('signer_two_mail', Auth::user()->email)
        //     ->get();

        // $data = [
        //     'intent' => auth()->user()->createSetupIntent()
        // ];

        // return view('subscriptions.payment', compact('files', 'contracts'))->with($data);
    }

    public function store(Request $request)
    {

        // $this->validate($request, [
        //     'token' => 'required'
        // ]);

        // $plan = Plans::where('identifier', $request->plan)
        //     ->orWhere('identifier', 'basic')
        //     ->first();

        // // dd($request->plan);

        // $request->user()->newSubscription('default', $plan->stripe_id)->create($request->token);

        // return back();

    }
}
