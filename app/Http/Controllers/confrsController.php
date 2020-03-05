<?php

namespace App\Http\Controllers;

use App\confrm;
use App\confrs;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class confrsController extends Controller
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
            if ($request->hasFile('confrsvbigi')) {
                $image = $request->file('confrsvbigi');
                $img = Image::make($image);

                $imageName = time() . '.' . $request->file('confrsvbigi')->getClientOriginalExtension();
                $img = $img->save(base_path() . '/public/images/' . $imageName);

                //  $request->file('confrsvbigi')->move(base_path() . '/public/images/', $imageName);


            } else {
                $imageName = "noimage.png";
            }
            $confrs = new confrs;
            $confrs->confrstdesc = $request->confrstdesc;
            $confrs->confrsttitl = $request->confrsttitl;
            $confrs->confrsyorde = 0;
            $confrs->confrmscode = $request->confrmscode;
            $confrs->confrsbenbl = 1;
            if ($request->has('confrsdpubl')) {
                $confrs->confrsdpubl = $request->confrsdpubl;
            } else {
                $confrs->confrsdpubl = Carbon::now()->format('Y-m-d');
            }
            $confrs->confrsvsmai = null;
            if ($imageName == null) {
            } else {
                $confrs->confrsvbigi = $imageName;
            }
            $confrs->save();
            return response()->json($confrs);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json($e->getMessage());
            // something went wrong
        }
    }

    public function storeServicios(Request $request)
    {
        DB::beginTransaction();
        try {
            if ($request->hasFile('confrsvbigi')) {
                $image = $request->file('confrsvbigi');
                $img = Image::make($image);

                $imageName = time() . '.' . $request->file('confrsvbigi')->getClientOriginalExtension();
                $img->resize(200, 200);
                $img = $img->save(base_path() . '/public/images/' . $imageName);
                //  $request->file('confrsvbigi')->move(base_path() . '/public/images/', $imageName);
            } else {
                $imageName = "noimage.png";
            }
            if ($request->tipo == 0) {
                $confrm = new confrm;
                $confrm->confrmtdesc = $request->confrstdesc;
                $confrm->confrmttitl = $request->confrsttitl;
                $confrm->confrmyorde = 0;
                $confrm->confrmbenbl = 1;
                $confrm->confrmsfcod = 2;
                $confrm->confrmyadmf = 0;
                $confrm->confrmvsmai = "fa ".$request->confrmvsmai;
                $confrm->contypscod0 = $request->contypscod0;
                $confrm->save();
                DB::commit();
                return response()->json($confrm);
            } else if ($request->tipo == 1) {
                $confrs = new confrs;
                $confrs->confrstdesc = $request->confrstdesc;
                $confrs->confrsttitl = $request->confrsttitl;
                $confrs->confrsyorde = 0;
                $confrs->confrmscode = $request->confrmscode;
                $confrs->confrsbenbl = 1;
                if ($request->has('confrsdpubl')) {
                    $confrs->confrsdpubl = $request->confrsdpubl;
                } else {
                    $confrs->confrsdpubl = Carbon::now()->format('Y-m-d');
                }
                $confrs->confrsvsmai = null;
                if ($imageName == null) {
                } else {
                    $confrs->confrsvbigi = $imageName;
                }
                $confrs->save();
                DB::commit();
                return response()->json($confrs);
            }
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json($e->getMessage());
            // something went wrong
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\confrs  $confrs
     * @return \Illuminate\Http\Response
     */
    public function showServicios(Request $request, $confrmscode)
    {
        if ($request->confrsscode != null) {
            $data =  confrm::join('confrs', 'confrm.confrmscode', 'confrs.confrmscode')
                ->where('confrsscode', $request->confrsscode)->first();
            return response()->json(['servicio' => $data, 'isService' => true,]);
        } else {
            $data =  confrm::where('confrmscode', $confrmscode)->first();
            return response()->json(['servicio' => $data, 'isService' => false,]);
        }

    }
    public function show(Request $request, $confrmscode)
    {
      
        $data =  confrm::join('confrs', 'confrm.confrmscode', 'confrs.confrmscode')
        ->where('confrs.confrmscode', $confrmscode)->first();
            return response()->json($data);

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\confrs  $confrs
     * @return \Illuminate\Http\Response
     */
    public function edit( $confrsscode)
    {
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\confrs  $confrs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $confrscode)
    {
        // return response()->json($request->hasFile('confrsvbigi'));

        if ($request->hasFile('confrsvbigi')) {
            $image = $request->file('confrsvbigi');
            $img = Image::make($image);
            $imageName =  time() . '.' . $request->file('confrsvbigi')->getClientOriginalExtension();
            // $img->resize(350, 235);
            $img = $img->save(base_path() . '/public/images/' . $imageName);
        } else {
            $imageName = null;
        }
        $confrs = confrs::where('confrsscode', $request->confrsscode)->first();
        $confrs->confrstdesc = $request->confrstdesc;
        $confrs->confrsttitl = $request->confrsttitl;
        $confrs->confrmscode = $request->confrmscode;
        if ($request->has('confrsdpubl')) {
            $confrs->confrsdpubl = $request->confrsdpubl;
        }
        if ($imageName == null) {
        } else {
            $confrs->confrsvbigi = $imageName;
        }
        $confrs->save();
        return response()->json($confrs);
    }
    public function updateServicios(Request $request)
    {
        // return response()->json($request->all());

        DB::beginTransaction();
        try {
            if ($request->hasFile('confrsvbigi')) {
                $image = $request->file('confrsvbigi');
                $img = Image::make($image);

                $imageName = time() . '.' . $request->file('confrsvbigi')->getClientOriginalExtension();
                $img->resize(200, 200);
                $img = $img->save(base_path() . '/public/images/' . $imageName);
                //  $request->file('confrsvbigi')->move(base_path() . '/public/images/', $imageName);
            } else {
                $imageName = "noimage.png";
            }
            if ($request->tipo == 0) {
                $confrm = confrm::where('confrmscode', $request->confrmscode_id)->first();
                $confrm->confrmtdesc = $request->confrstdesc;
                $confrm->confrmttitl = $request->confrsttitl;
                $confrm->confrmyorde = 0;
                $confrm->confrmbenbl = 1;
                $confrm->confrmvsmai = $request->confrmvsmai;
                $confrm->confrmsfcod = 2;
                $confrm->confrmyadmf = 0;
                $confrm->contypscod0 = $request->contypscod0;
                $confrm->save();
                DB::commit();
                return response()->json($confrm);
            } else if ($request->tipo == 1) {
                $confrs = confrs::where('confrsscode', $request->confrsscode)->first();
                $confrs->confrstdesc = $request->confrstdesc;
                $confrs->confrsttitl = $request->confrsttitl;
                $confrs->confrsyorde = 0;
                $confrs->confrmscode = $request->confrmscode;
                $confrs->confrsbenbl = 1;
                if ($request->has('confrsdpubl')) {
                    $confrs->confrsdpubl = $request->confrsdpubl;
                } else {
                    $confrs->confrsdpubl = Carbon::now()->format('Y-m-d');
                }
                $confrs->confrsvsmai = null;
                if ($imageName == null) {
                } else {
                    $confrs->confrsvbigi = $imageName;
                }
                $confrs->save();
                DB::commit();

                return response()->json($confrs);
            }
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json($e->getMessage());
            // something went wrong
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\confrs  $confrs
     * @return \Illuminate\Http\Response
     */
    public function destroy($confrsscode)
    {
        $data =  confrs::where('confrsscode', $confrsscode)->first();
        $data->confrsbenbl = 0;
        $data->save();
        return response()->json(true);
    }
}
