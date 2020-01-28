<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;
use Session;
use App\confrm;
use App\secusr;
class datatablesController extends Controller
{
    public function datatablesQuienesSomos(Request $request)
    {
        // $data = tougrp::join('plainf','plainf.plainficode', 'tougrp.plainficode')->where('tougrp.touinfscode', $request->touinfscode)->get();
        $data = confrm::select('confrs.*')->join('confrs','confrs.confrmscode','confrm.confrmscode')->where('confrs.confrmscode',$request->confrmscode)->where('confrs.confrsbenbl',1)->get();
        return Datatables::of($data)->make(true);
    }
    public function datatablesRedesSociales(Request $request)
    {
        // $data = tougrp::join('plainf','plainf.plainficode', 'tougrp.plainficode')->where('tougrp.touinfscode', $request->touinfscode)->get();
        $data = confrm::select('confrs.*')->join('confrs','confrs.confrmscode','confrm.confrmscode')->where('confrs.confrmscode',$request->confrmscode)->where('confrs.confrsbenbl',1)->get();
        return Datatables::of($data)->make(true);
    }
    public function datatablesGestionarMenu(Request $request)
    {
        // return $request->all();
        // $data = tougrp::join('plainf','plainf.plainficode', 'tougrp.plainficode')->where('tougrp.touinfscode', $request->touinfscode)->get();
        if($request->contypscode == 0 && $request->contypscode1 == null){
            $data = confrm::whereNull('confrmsfcod')->get();

        }else if($request->contypscode == 1 && $request->contypscode1 != null){
            $data = confrm::where('confrmsfcod',$request->contypscode1)->get();

        }else{
            $data = [];
        }
        return Datatables::of($data)->make(true);
    }
    public function datatablesUsuarios(Request $request)
    {
        // $data = tougrp::join('plainf','plainf.plainficode', 'tougrp.plainficode')->where('tougrp.touinfscode', $request->touinfscode)->get();
        $data = secusr::join('huremp','huremp.hurempicode','secusr.hurempicode')
        ->join('contyp','contyp.contypscode','secusr.contypscode')
        ->where('contyp.contypsnumt',1)
        ->where('secusr.contypscode', $request->contypscode)->get();
        return Datatables::of($data)->make(true);
    }
}
