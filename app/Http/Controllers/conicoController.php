<?php

namespace App\Http\Controllers;

use App\conico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class conicoController extends Controller
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
    public function icons(Request $request)
    {
         
        $data = [];
        if ($request->has('search') and $request->search != "") {
            $search = $request->search;
            $data = DB::table("conico")
            ->where('conicotdesc', 'LIKE', "%$search%")->take(5)
            ->get();
        }else{
            $data = conico::take(20)->get();
        }
        return response()->json($data);


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
     * @param  \App\conico  $conico
     * @return \Illuminate\Http\Response
     */
    public function show(conico $conico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\conico  $conico
     * @return \Illuminate\Http\Response
     */
    public function edit(conico $conico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\conico  $conico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, conico $conico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\conico  $conico
     * @return \Illuminate\Http\Response
     */
    public function destroy(conico $conico)
    {
        //
    }
}
