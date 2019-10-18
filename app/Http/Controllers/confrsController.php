<?php

namespace App\Http\Controllers;

use App\confrm;
use App\confrs;
use Illuminate\Http\Request;

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
        //
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
            $imageName = str_random(30) . '.' . $request->file('confrsvbigi')->getClientOriginalExtension();
            $request->file('confrsvbigi')->move(base_path() . '/public/images/', $imageName);
        } else {
            $imageName = null;
        }
        $confrs = confrs::where('confrsscode', $request->confrsscode)->first();
        $confrs->confrstdesc = $request->confrstdesc;
        $confrs->confrsttitl = $request->confrsttitl;
        if ($imageName == null) { } else {
            $confrs->tougrpvimgg = $imageName;
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
    public function destroy(confrs $confrs)
    {
        //
    }
}
