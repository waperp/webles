<?php

namespace App\Http\Controllers;

use App\confrm;
use App\confrs;
use Illuminate\Http\Request;
use Image;
class confrsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->hasFile('confrsvbigi')) {
            $image = $request->file('confrsvbigi');
            $img = Image::make($image);

            $imageName = time() . '.' . $request->file('confrsvbigi')->getClientOriginalExtension();
            $img->resize(100, 100);
            $img = $img->save($imageName);
            // $request->file('confrsvbigi')->move(base_path() . '/public/images/', $imageName);

       
        } else {
            $imageName = "noimage.png";
        }
        $confrs = new confrs;
        $confrs->confrstdesc = $request->confrstdesc;
        $confrs->confrsttitl = $request->confrsttitl;
        $confrs->confrsyorde = 0;
        $confrs->confrmscode = 6;
        $confrs->confrsbenbl = 1;
        $confrs->confrsvsmai = null;
        if ($imageName == null) { } else {
            $confrs->confrsvbigi = $imageName;
        }
        $confrs->save();
        return response()->json($confrs);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\confrs  $confrs
     * @return \Illuminate\Http\Response
     */
    public function show($confrsscode)
    {
        $data =  confrs::where('confrsscode', $confrsscode)->first();
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\confrs  $confrs
     * @return \Illuminate\Http\Response
     */
    public function edit(confrs $confrs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\confrs  $confrs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $confrscode)
    {

        if ($request->hasFile('confrsvbigi')) {
            $image = $request->file('confrsvbigi');
            $img = Image::make($image);
            $imageName =  time(). '.' . $request->file('confrsvbigi')->getClientOriginalExtension();
            $img->resize(350, 235);
            $img = $img->save(base_path() . '/public/images/'.$imageName);

        } else {
            $imageName = null;
        }
        $confrs = confrs::where('confrsscode', $request->confrsscode)->first();
        $confrs->confrstdesc = $request->confrstdesc;
        $confrs->confrsttitl = $request->confrsttitl;
        if ($imageName == null) { } else {
            $confrs->confrsvbigi = $imageName;
        }
        $confrs->save();
        return response()->json($confrs);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\confrs  $confrs
     * @return \Illuminate\Http\Response
     */
    public function destroy($confrsscode)
    {
        $data =  confrs::where('confrsscode', $confrsscode)->first();
        $data->confrsbenbl = 0;
        $data->save();
        return response()->json(true);
    }
}
