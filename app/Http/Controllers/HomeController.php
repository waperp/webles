<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\confrm;
use App\confrs;

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
        $data = \DB::select('select confrm.confrmscode, confrm.confrmttitl FROM confrm WHERE confrm.confrmsfcod=?', [$request->confrmsfcod]);
        return response()->json($data);

    }
}
