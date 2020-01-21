<?php

namespace App\Http\Controllers;

use App\secusr;
use App\huremp;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class secusrController extends Controller
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
        // return $request->all();
        if ($request->hasFile('hurempvimgh')) {
            $imageName = Str::random(30) . '.' . $request->file('hurempvimgh')->getClientOriginalExtension();
            $request->file('hurempvimgh')->move(base_path() . '/public/images/', $imageName);
        } else {
            $imageName = "user-avatar.png";
        }
        $hurempnew = new huremp;
        $hurempnew->huremptfnam = $request->huremptfnam;
        $hurempnew->hurempbgend = 1;
        $hurempnew->hurempddobh = Carbon::now()->format('Y-m-d');
        $hurempnew->hurempidocn = 0;
        $hurempnew->hurempvimgh = $imageName;
        $hurempnew->huremptinco = 0;
        $hurempnew->hurempbenbl = 1;
        $usernew = new user;
        $usernew->secusrtmail = $request->secusrtmail;
        $usernew->secusrtpass =Hash::make($request->secusrtpass);
        $usernew->secusrdregu = Carbon::now()->format('Y-m-d');
        $usernew->secusrdvalu = Carbon::now()->format('Y-m-d');
        $usernew->constascode = 1;
        $usernew->contypscode = 1;
        $usernew->secusrbenbl = 1;
        $usernew->hurempicode = $hurempnew->hurempicode;
        return $hurempnew->secconnuuid;
        return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\secusr  $secusr
     * @return \Illuminate\Http\Response
     */
    public function show(secusr $secusr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\secusr  $secusr
     * @return \Illuminate\Http\Response
     */
    public function edit(secusr $secusr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\secusr  $secusr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // return $request->all();
        if ($request->hasFile('hurempvimgh')) {
            $imageName = Str::random(30) . '.' . $request->file('hurempvimgh')->getClientOriginalExtension();
            $request->file('hurempvimgh')->move(base_path() . '/public/images/', $imageName);
        } else {
            $imageName = null;
        }
        // return $imageName;
        $secusr = secusr::join('huremp', 'huremp.hurempicode', 'secusr.hurempicode')
            ->where('secusr.secusricode', \Auth::user()->secusricode)->first();
        $huremp = huremp::join('secusr', 'huremp.hurempicode', 'secusr.hurempicode')
            ->where('huremp.hurempicode', \Auth::user()->hurempicode)->first();
        if ($request->secusrtpass != null) {
            $secusr->secusrtpass =  Hash::make($request->secusrtpass);
        }
        $huremp->huremptfnam = $request->huremptfnam;
        if ($imageName != null) {
            $huremp->hurempvimgh = $imageName;
        }
        $secusr->save();
        $huremp->save();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\secusr  $secusr
     * @return \Illuminate\Http\Response
     */
    public function destroy(secusr $secusr)
    {
        //
    }
}
