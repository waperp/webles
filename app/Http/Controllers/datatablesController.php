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
        $data = confrm::select('confrs.*')->join('confrs', 'confrs.confrmscode', 'confrm.confrmscode')->where('confrs.confrmscode', $request->confrmscode)->where('confrs.confrsbenbl', 1)->get();
        return Datatables::of($data)->make(true);
    }
    public function datatablesRedesSociales(Request $request)
    {
        // $data = tougrp::join('plainf','plainf.plainficode', 'tougrp.plainficode')->where('tougrp.touinfscode', $request->touinfscode)->get();
        $data = confrm::select('confrs.*')->join('confrs', 'confrs.confrmscode', 'confrm.confrmscode')->where('confrs.confrmscode', $request->confrmscode)->where('confrs.confrsbenbl', 1)->get();
        return Datatables::of($data)->make(true);
    }
    public function datatablesGestionarMenu(Request $request)
    {
        // return $request->all();
        $data = [];
        // return response()->json($request->all());

        // $data = tougrp::join('plainf','plainf.plainficode', 'tougrp.plainficode')->where('tougrp.touinfscode', $request->touinfscode)->get();
        if ($request->has('contypscode') && $request->has('contypscode1') == false) {
            // return response()->json($request->all());
            if ($request->contypscode == 0) {

                $data = confrm::whereNull('confrmsfcod')->get();
            } else {
                $data = [];
            }
        } else if ($request->has('contypscode') && $request->has('contypscode1')) {
            if ($request->contypscode == 1) {
                $data = confrm::where('confrmsfcod', $request->contypscode1)->get();
            } else {
                $data = [];
            }
        } else {
            $data = [];
        }
        return Datatables::of($data)->make(true);
    }

    public function datatablesServicios(Request $request)
    {
        $data = [];
        if ($request->has('contypscode') && $request->has('contypscode1') == false) {
            if ($request->contypscode == 0) {
                $data = confrm::whereConfrmsfcod(2)->get();
            } else {
                $data = [];
            }
        } else if ($request->has('contypscode') && $request->has('contypscode1')) {
            if ($request->contypscode == 1) {
                $data = confrm::select('confrm.*', 'confrs.*')->join('confrs', 'confrs.confrmscode', 'confrm.confrmscode')
                    ->where('confrs.confrmscode', $request->contypscode1)->get();
            } else {
                $data = [];
            }
        } else {
            $data = [];
        }
        return Datatables::of($data)->make(true);
    }
    public function datatablesUsuarios(Request $request)
    {
        // $data = tougrp::join('plainf','plainf.plainficode', 'tougrp.plainficode')->where('tougrp.touinfscode', $request->touinfscode)->get();
        $data = secusr::join('huremp', 'huremp.hurempicode', 'secusr.hurempicode')
            ->join('contyp', 'contyp.contypscode', 'secusr.contypscode')
            ->where('contyp.contypsnumt', 1)
            ->where('secusr.contypscode', $request->contypscode)->get();
        return Datatables::of($data)->make(true);
    }
}
