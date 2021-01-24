<?php

namespace App\Http\Controllers;

use App\Contract;
use App\File;
use App\Slider;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::whereUserId(Auth::user()->id)->OrderBy('id', 'desc')->get();
        $contracts = Contract::where('owner_id', Auth::user()->id)
            ->orWhere('guest_id', Auth::user()->id)
            ->get();
        $sliders = Slider::all();

        return view('landing.sliders.index', compact('files', 'sliders', 'contracts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $files = File::whereUserId(Auth::user()->id)->OrderBy('id', 'desc')->get();
        $contracts = Contract::where('owner_id', Auth::user()->id)
            ->orWhere('guest_id', Auth::user()->id)
            ->get();

        return view('landing.sliders.create', compact('files', 'contracts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd('store');
        $files = File::whereUserId(Auth::user()->id)->OrderBy('id', 'desc')->get();
        $contracts = Contract::where('owner_id', Auth::user()->id)
            ->orWhere('guest_id', Auth::user()->id)
            ->get();
        $slider = new Slider;

        $file = $request->file('banner');
        $name = str_replace(' ','-', $file->getClientOriginalName());
        $path = 'Sliders/' . $name;
        if( Storage::putFileAs('/public/' . 'Sliders/', $file, $name )){
            $slider::create([
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'paragraph' => $request->paragraph,
                'banner' => $path,
            ]);
        }

        Toastr::success('Se añadió un nuevo slide','Bien hecho!');
        return redirect()->route('sliders.index', compact('files', 'contracts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $files = File::whereUserId(Auth::user()->id)->OrderBy('id', 'desc')->get();
        $contracts = Contract::where('owner_id', Auth::user()->id)
            ->orWhere('guest_id', Auth::user()->id)
            ->get();
        $slider = Slider::find($id);

        return view('landing.sliders.show', compact('files', 'slider', 'contracts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $files = File::whereUserId(Auth::user()->id)->OrderBy('id', 'desc')->get();
        $contracts = Contract::where('owner_id', Auth::user()->id)
            ->orWhere('guest_id', Auth::user()->id)
            ->get();
        $slider = Slider::find($id);

        return view('landing.sliders.edit', compact('files', 'slider', 'contracts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slider = Slider::find($id);
        $slider->update($request->all());

        if( $request->banner ){
            $file = $request->file('banner');
            $name = str_replace(' ','-', $file->getClientOriginalName());
            $path = 'Sliders/' . $name;
            Storage::putFileAs('/public/' . 'Sliders/', $file, $name );
            $slider::whereId($id)->update([
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'paragraph' => $request->paragraph,
                'banner' => $path,
            ]);
        }

        Toastr::success('Se actualizó con éxito','Bien');
        return redirect()->route('sliders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);

        $slider->delete();

        Toastr::warning('Ya no lo veremos por aqui.','Banner borrado');
        return redirect()->route('sliders.index');
    }
}
