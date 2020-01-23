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
        DB::beginTransaction();

try {
    
    if ($request->hasFile('hurempvimgh')) {
        $imageName = Str::random(30) . '.' . $request->file('hurempvimgh')->getClientOriginalExtension();
        $request->file('hurempvimgh')->move(base_path() . '/public/images/', $imageName);
    } else {
        $imageName = "user-avatar.png";
    }
    $validateMail = secusr::where('secusrtmail',$request->secusrtmail)->first();
    if(!$validateMail){
        $hurempnew = new huremp;
        $hurempnew->huremptfnam = $request->huremptfnam;
        $hurempnew->hurempbgend = $request->hurempbgend;
        $hurempnew->hurempddobh = Carbon::now()->format('Y-m-d');
        $hurempnew->hurempidocn = 0;
        $hurempnew->hurempvimgh = $imageName;
        $hurempnew->huremptinco = 0;
        $hurempnew->hurempbenbl = 1;
        $hurempnew->save();
        $usernew = new secusr;
        $usernew->secusrtmail = $request->secusrtmail;
        $usernew->secusrtpass =Hash::make($request->secusrtpass);
        $usernew->secusrdregu = Carbon::now()->format('Y-m-d');
        $usernew->secusrdvalu = Carbon::now()->format('Y-m-d');
        $usernew->constascode = 1;
        $usernew->contypscode = $request->contypscode;
        $usernew->secusrbenbl = 1;
        $usernew->hurempicode = $hurempnew->hurempicode;
        $usernew->save();
        DB::commit();
        // return redirect('/');
        return response()->json(true);
    }else{
        return response()->json(false);

    }
   


    // return $usernew;



    // all good
} catch (\Exception $e) {
   
    DB::rollback();
    return response()->json($e->getMessage());

    // something went wrong
}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\secusr  $secusr
     * @return \Illuminate\Http\Response
     */
    public function show($secusricode, Request $request)
    {
        $data = secusr::select('secusr.*','huremp.hurempvimgh',
        'huremp.huremptfnam','huremp.hurempbgend','contyp.contypscode','contyp.contyptdesc')
        ->join('huremp','huremp.hurempicode','secusr.hurempicode')
        ->join('contyp','contyp.contypscode','secusr.contypscode')
        ->where('secusr.secusricode', $secusricode)->first();
        return response()->json($data);

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
    public function update_user(Request $request)
    {
        try {
    
            if ($request->hasFile('hurempvimgh')) {
                $imageName = Str::random(30) . '.' . $request->file('hurempvimgh')->getClientOriginalExtension();
                $request->file('hurempvimgh')->move(base_path() . '/public/images/', $imageName);
            } else {
                $imageName = null;
            }
            $validateUser = secusr::where('secconnuuid',$request->secconnuuid)->first();

            if($validateUser){
                    $hurempnew = huremp::where('hurempicode',$validateUser->hurempicode)->first();
                    $hurempnew->huremptfnam = $request->huremptfnam;
                    $hurempnew->hurempbgend = $request->hurempbgend;
                    if($imageName != null){
                        $hurempnew->hurempvimgh = $imageName;
                    }
                    $hurempnew->save();
                    if($request->has('secusrtpass')){
                        $validateUser->secusrtpass =Hash::make($request->secusrtpass);

                    }
                    $validateUser->contypscode = $request->contypscode;
                    $validateUser->save();
                    DB::commit();
                 
               
                // return redirect('/');
                return response()->json(true);
            }else{
                return response()->json(false);
        
            }
           
        
        
            // return $usernew;
        
        
        
            // all good
        } catch (\Exception $e) {
           
            DB::rollback();
            return response()->json($e->getMessage());
        
            // something went wrong
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\secusr  $secusr
     * @return \Illuminate\Http\Response
     */
    public function destroy( $secusricode)
    {
        $secusr = secusr::where('secusr.secusricode', $secusricode)->first();
        $huremp = huremp::where('huremp.hurempicode', $secusr->hurempicode)->first();
        $secusr->secusrbenbl= 0;
        $huremp->hurempbenbl= 0;
        $secusr->save();
        $huremp->save();
        return response()->json(true);
    }
}
