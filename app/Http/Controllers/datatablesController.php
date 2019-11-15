<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;
use Session;
use App\confrm;
class datatablesController extends Controller
{
    public function datatablesQuienesSomos(Request $request)
    {
        // $data = tougrp::join('plainf','plainf.plainficode', 'tougrp.plainficode')->where('tougrp.touinfscode', $request->touinfscode)->get();
        $data = confrm::select('confrs.*')->join('confrs','confrs.confrmscode','confrm.confrmscode')->where('confrs.confrmscode',6)->where('confrs.confrsbenbl',1)->get();
        return Datatables::of($data)->make(true);
    }
}
