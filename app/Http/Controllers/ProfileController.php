<?php

namespace App\Http\Controllers;

use App\Contract;
use App\File;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $files = File::whereUserId(Auth::user()->id)->OrderBy('id', 'desc')->get();
        $contracts = Contract::where('owner_id', Auth::user()->id)
            ->orWhere('signer_two_mail', Auth::user()->email)
            ->get();

        return view('profile.edit', compact('files', 'contracts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        auth()->user()->update($request->all());

        Toastr::success('Se actualizaron tus datos','Muy bien!');
        return back();
    }

    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        Toastr::success('Se actualizaron tu password','Muy bien!');
        return back()->withPasswordStatus(__('Password successfully updated.'));
    }
}
