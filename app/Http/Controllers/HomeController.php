<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\confrm;
use App\confrs;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }
    public function demo($slug,$secconnuuid)
    {
        $data =  confrs::join('confrm','confrm.confrmscode','confrs.confrmscode')->where('confrs.secconnuuid', $secconnuuid)->first();

        return view('demo', compact(['data']));
        
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return confrm::treeAdmin();
        // return $items;
        // return Hash::make('123');
        // return confrm::nivel(12)->sections;
        // return confrm::treeAdmin();
        return view('home');
    }
    public function selectSubform(Request $request)
    {
        $data = DB::select('select * FROM confrm WHERE confrm.confrmsfcod=?', [$request->confrmsfcod]);
        return response()->json($data);

    }
    public function selectUserSubform(Request $request)
    {
        $data = DB::select('select * from contyp where contypsnumt = 1');
        return response()->json($data);

    }
    public function selectGestionarMenuSubform(Request $request)
    {
        $data = DB::select('select * from contyp where contypsnumt = 3');
        return response()->json($data);
    }
    public function selectGestionarMenuSubformServicios(Request $request)
    {
        $data = DB::select('select * from contyp where contypsnumt = 4');
        return response()->json($data);
    }
    public function selectGestionarMenuSubMenu(Request $request)
    {
        $data = confrm::whereNull('confrmsfcod')->get();
        return response()->json($data);

    }
    public function selectServiciosSubMenu(Request $request)
    {
        $data = confrm::whereConfrmsfcod(2)->get();
        return response()->json($data);

    }
    public function listaServicio(Request $request)
    {
        $data = confrs::whereConfrmscode($request->confrmscode)->get();
        return response()->json($data);

    }
}
