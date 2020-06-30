<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\confrm;
use Illuminate\Http\Request;

class confrmController extends Controller
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
        DB::beginTransaction();
        try {

            // return response()->json($request->all());
            $confrm = new confrm;
            $confrm->confrmttitl = $request->confrmttitl;
            $confrm->confrmtdesc = $request->confrmtdesc;
            $confrm->confrmyorde = 0;
            $confrm->confrmvsmai = $request->confrmvsmai;
            $confrm->confrmbenbl = 1;
            if($request->tipoMenu == 0){
                $confrm->confrmsfcod = null;
            }else if($request->tipoMenu == 1){
                $confrm->confrmsfcod = $request->confrmsfcod;
            }
            $confrm->confrmyadmf = 0;
            $confrm->contypscod0 = $request->contypscod0;
            $confrm->save();
            DB::commit();
            return response()->json($confrm);

        } catch (\Exception $e) {
            DB::rollback();
            return response()->json($e->getMessage());
            // something went wrong
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\confrm  $confrm
     * @return \Illuminate\Http\Response
     */
    public function show( $confrmscode)
    {
        $confrm = confrm::where('confrmscode',$confrmscode)->first();
        return response()->json($confrm);
    }
    public function showconfrm( $confrmscode)
    {
        $confrm = confrm::where('confrmscode',$confrmscode)->first();
        return response()->json($confrm);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\confrm  $confrm
     * @return \Illuminate\Http\Response
     */
    public function edit( $confrmscode)
    {
        $confrm = confrm::where('confrmscode',$confrmscode)->first();
        return response()->json($confrm);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\confrm  $confrm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $secconnuuid)
    {
        DB::beginTransaction();
        try {
        $confrm =  confrm::where('secconnuuid',$secconnuuid)->first();

            // return response()->json($request->all());
            $confrm->confrmttitl = $request->confrmttitl;
            $confrm->confrmtdesc = $request->confrmtdesc;
            $confrm->confrmyorde = 0;
            $confrm->confrmvsmai = $request->confrmvsmai;
            $confrm->confrmbenbl = 1;
            if($request->tipoMenu == 0){
                $confrm->confrmsfcod = null;
            }else if($request->tipoMenu == 1){
                $confrm->confrmsfcod = $request->confrmsfcod;
            }
            $confrm->confrmyadmf = $request->confrmyadmf;
            $confrm->contypscod0 = $request->contypscod0;
            $confrm->save();
            DB::commit();
            return response()->json($confrm);

        } catch (\Exception $e) {
            DB::rollback();
            return response()->json($e->getMessage());
            // something went wrong
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\confrm  $confrm
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request, $confrm)
    { 
        DB::beginTransaction();
        try {
        $confrm =  confrm::where('confrmscode',$confrm)->first();

          
            $confrm->confrmbenbl = 0;
            $confrm->save();
            DB::commit();
            return response()->json($confrm);

        } catch (\Exception $e) {
            DB::rollback();
            return response()->json($e->getMessage());
            // something went wrong
        }
        
    }
}
