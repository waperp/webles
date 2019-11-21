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
    public function demo()
    {
        return view('demo');
        
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
        return view('home');
    }
    public function selectSubform()
    {
        $data = \DB::select('select confrm.confrmscode, confrm.confrmttitl FROM confrm WHERE confrm.confrmsfcod= 1');
        return response()->json($data);

    }
}
