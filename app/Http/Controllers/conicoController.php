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
        if ($request->has('q') AND $request->q != "") {
            $search = $request->q;
            $data = DB::table("conico")
            ->whereRaw("MATCH(conicotdesc) AGAINST ('{$search}*' IN BOOLEAN MODE)")
            ->get();
        }else{
            $data = conico::all();
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
