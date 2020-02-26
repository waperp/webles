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
                $img->resize(200, 200);
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
                $confrm->confrmyadmf = "fa ".$request->confrmyadmf;
                $confrm->confrmvsmai = $request->confrmvsmai;
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
    public function show(Request $request, $confrmscode)
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\confrs  $confrs
     * @return \Illuminate\Http\Response
     */
    public function edit( $confrsscode)
    {
        $DATA_ICONS = [
            [ "id"=> "fa-500px", "text"=> "fa-500px" ],
            [ "id"=> "fa-address-book", "text"=> "fa-address-book" ],
            [ "id"=> "fa-address-book-o", "text"=> "fa-address-book-o" ],
            [ "id"=> "fa-address-card", "text"=> "fa-address-card" ],
            [ "id"=> "fa-address-card-o", "text"=> "fa-address-card-o" ],
            [ "id"=> "fa-adjust", "text"=> "fa-adjust" ],
            [ "id"=> "fa-adn", "text"=> "fa-adn" ],
            [ "id"=> "fa-align-center", "text"=> "fa-align-center" ],
            [ "id"=> "fa-align-justify", "text"=> "fa-align-justify" ],
            [ "id"=> "fa-align-left", "text"=> "fa-align-left" ],
            [ "id"=> "fa-align-right", "text"=> "fa-align-right" ],
            [ "id"=> "fa-amazon", "text"=> "fa-amazon" ],
            [ "id"=> "fa-ambulance", "text"=> "fa-ambulance" ],
            [ "id"=> "fa-american-sign-language-interpreting", "text"=> "fa-american-sign-language-interpreting" ],
            [ "id"=> "fa-anchor", "text"=> "fa-anchor" ],
            [ "id"=> "fa-android", "text"=> "fa-android" ],
            [ "id"=> "fa-angellist", "text"=> "fa-angellist" ],
            [ "id"=> "fa-angle-double-down", "text"=> "fa-angle-double-down" ],
            [ "id"=> "fa-angle-double-left", "text"=> "fa-angle-double-left" ],
            [ "id"=> "fa-angle-double-right", "text"=> "fa-angle-double-right" ],
            [ "id"=> "fa-angle-double-up", "text"=> "fa-angle-double-up" ],
            [ "id"=> "fa-angle-down", "text"=> "fa-angle-down" ],
            [ "id"=> "fa-angle-left", "text"=> "fa-angle-left" ],
            [ "id"=> "fa-angle-right", "text"=> "fa-angle-right" ],
            [ "id"=> "fa-angle-up", "text"=> "fa-angle-up" ],
            [ "id"=> "fa-apple", "text"=> "fa-apple" ],
            [ "id"=> "fa-archive", "text"=> "fa-archive" ],
            [ "id"=> "fa-area-chart", "text"=> "fa-area-chart" ],
            [ "id"=> "fa-arrow-circle-down", "text"=> "fa-arrow-circle-down" ],
            [ "id"=> "fa-arrow-circle-left", "text"=> "fa-arrow-circle-left" ],
            [ "id"=> "fa-arrow-circle-o-down", "text"=> "fa-arrow-circle-o-down" ],
            [ "id"=> "fa-arrow-circle-o-left", "text"=> "fa-arrow-circle-o-left" ],
            [ "id"=> "fa-arrow-circle-o-right", "text"=> "fa-arrow-circle-o-right" ],
            [ "id"=> "fa-arrow-circle-o-up", "text"=> "fa-arrow-circle-o-up" ],
            [ "id"=> "fa-arrow-circle-right", "text"=> "fa-arrow-circle-right" ],
            [ "id"=> "fa-arrow-circle-up", "text"=> "fa-arrow-circle-up" ],
            [ "id"=> "fa-arrow-down", "text"=> "fa-arrow-down" ],
            [ "id"=> "fa-arrow-left", "text"=> "fa-arrow-left" ],
            [ "id"=> "fa-arrow-right", "text"=> "fa-arrow-right" ],
            [ "id"=> "fa-arrow-up", "text"=> "fa-arrow-up" ],
            [ "id"=> "fa-arrows", "text"=> "fa-arrows" ],
            [ "id"=> "fa-arrows-alt", "text"=> "fa-arrows-alt" ],
            [ "id"=> "fa-arrows-h", "text"=> "fa-arrows-h" ],
            [ "id"=> "fa-arrows-v", "text"=> "fa-arrows-v" ],
            [ "id"=> "fa-asl-interpreting", "text"=> "fa-asl-interpreting" ],
            [ "id"=> "fa-assistive-listening-systems", "text"=> "fa-assistive-listening-systems" ],
            [ "id"=> "fa-asterisk", "text"=> "fa-asterisk" ],
            [ "id"=> "fa-at", "text"=> "fa-at" ],
            [ "id"=> "fa-audio-description", "text"=> "fa-audio-description" ],
            [ "id"=> "fa-automobile", "text"=> "fa-automobile" ],
            [ "id"=> "fa-backward", "text"=> "fa-backward" ],
            [ "id"=> "fa-balance-scale", "text"=> "fa-balance-scale" ],
            [ "id"=> "fa-ban", "text"=> "fa-ban" ],
            [ "id"=> "fa-bandcamp", "text"=> "fa-bandcamp" ],
            [ "id"=> "fa-bank", "text"=> "fa-bank" ],
            [ "id"=> "fa-bar-chart", "text"=> "fa-bar-chart" ],
            [ "id"=> "fa-bar-chart-o", "text"=> "fa-bar-chart-o" ],
            [ "id"=> "fa-barcode", "text"=> "fa-barcode" ],
            [ "id"=> "fa-bars", "text"=> "fa-bars" ],
            [ "id"=> "fa-bath", "text"=> "fa-bath" ],
            [ "id"=> "fa-bathtub", "text"=> "fa-bathtub" ],
            [ "id"=> "fa-battery", "text"=> "fa-battery" ],
            [ "id"=> "fa-battery-0", "text"=> "fa-battery-0" ],
            [ "id"=> "fa-battery-1", "text"=> "fa-battery-1" ],
            [ "id"=> "fa-battery-2", "text"=> "fa-battery-2" ],
            [ "id"=> "fa-battery-3", "text"=> "fa-battery-3" ],
            [ "id"=> "fa-battery-4", "text"=> "fa-battery-4" ],
            [ "id"=> "fa-battery-empty", "text"=> "fa-battery-empty" ],
            [ "id"=> "fa-battery-full", "text"=> "fa-battery-full" ],
            [ "id"=> "fa-battery-half", "text"=> "fa-battery-half" ],
            [ "id"=> "fa-battery-quarter", "text"=> "fa-battery-quarter" ],
            [ "id"=> "fa-battery-three-quarters", "text"=> "fa-battery-three-quarters" ],
            [ "id"=> "fa-bed", "text"=> "fa-bed" ],
            [ "id"=> "fa-beer", "text"=> "fa-beer" ],
            [ "id"=> "fa-behance", "text"=> "fa-behance" ],
            [ "id"=> "fa-behance-square", "text"=> "fa-behance-square" ],
            [ "id"=> "fa-bell", "text"=> "fa-bell" ],
            [ "id"=> "fa-bell-o", "text"=> "fa-bell-o" ],
            [ "id"=> "fa-bell-slash", "text"=> "fa-bell-slash" ],
            [ "id"=> "fa-bell-slash-o", "text"=> "fa-bell-slash-o" ],
            [ "id"=> "fa-bicycle", "text"=> "fa-bicycle" ],
            [ "id"=> "fa-binoculars", "text"=> "fa-binoculars" ],
            [ "id"=> "fa-birthday-cake", "text"=> "fa-birthday-cake" ],
            [ "id"=> "fa-bitbucket", "text"=> "fa-bitbucket" ],
            [ "id"=> "fa-bitbucket-square", "text"=> "fa-bitbucket-square" ],
            [ "id"=> "fa-bitcoin", "text"=> "fa-bitcoin" ],
            [ "id"=> "fa-black-tie", "text"=> "fa-black-tie" ],
            [ "id"=> "fa-blind", "text"=> "fa-blind" ],
            [ "id"=> "fa-bluetooth", "text"=> "fa-bluetooth" ],
            [ "id"=> "fa-bluetooth-b", "text"=> "fa-bluetooth-b" ],
            [ "id"=> "fa-bold", "text"=> "fa-bold" ],
            [ "id"=> "fa-bolt", "text"=> "fa-bolt" ],
            [ "id"=> "fa-bomb", "text"=> "fa-bomb" ],
            [ "id"=> "fa-book", "text"=> "fa-book" ],
            [ "id"=> "fa-bookmark", "text"=> "fa-bookmark" ],
            [ "id"=> "fa-bookmark-o", "text"=> "fa-bookmark-o" ],
            [ "id"=> "fa-braille", "text"=> "fa-braille" ],
            [ "id"=> "fa-briefcase", "text"=> "fa-briefcase" ],
            [ "id"=> "fa-btc", "text"=> "fa-btc" ],
            [ "id"=> "fa-bug", "text"=> "fa-bug" ],
            [ "id"=> "fa-building", "text"=> "fa-building" ],
            [ "id"=> "fa-building-o", "text"=> "fa-building-o" ],
            [ "id"=> "fa-bullhorn", "text"=> "fa-bullhorn" ],
            [ "id"=> "fa-bullseye", "text"=> "fa-bullseye" ],
            [ "id"=> "fa-bus", "text"=> "fa-bus" ],
            [ "id"=> "fa-buysellads", "text"=> "fa-buysellads" ],
            [ "id"=> "fa-cab", "text"=> "fa-cab" ],
            [ "id"=> "fa-calculator", "text"=> "fa-calculator" ],
            [ "id"=> "fa-calendar", "text"=> "fa-calendar" ],
            [ "id"=> "fa-calendar-check-o", "text"=> "fa-calendar-check-o" ],
            [ "id"=> "fa-calendar-minus-o", "text"=> "fa-calendar-minus-o" ],
            [ "id"=> "fa-calendar-o", "text"=> "fa-calendar-o" ],
            [ "id"=> "fa-calendar-plus-o", "text"=> "fa-calendar-plus-o" ],
            [ "id"=> "fa-calendar-times-o", "text"=> "fa-calendar-times-o" ],
            [ "id"=> "fa-camera", "text"=> "fa-camera" ],
            [ "id"=> "fa-camera-retro", "text"=> "fa-camera-retro" ],
            [ "id"=> "fa-car", "text"=> "fa-car" ],
            [ "id"=> "fa-caret-down", "text"=> "fa-caret-down" ],
            [ "id"=> "fa-caret-left", "text"=> "fa-caret-left" ],
            [ "id"=> "fa-caret-right", "text"=> "fa-caret-right" ],
            [ "id"=> "fa-caret-square-o-down", "text"=> "fa-caret-square-o-down" ],
            [ "id"=> "fa-caret-square-o-left", "text"=> "fa-caret-square-o-left" ],
            [ "id"=> "fa-caret-square-o-right", "text"=> "fa-caret-square-o-right" ],
            [ "id"=> "fa-caret-square-o-up", "text"=> "fa-caret-square-o-up" ],
            [ "id"=> "fa-caret-up", "text"=> "fa-caret-up" ],
            [ "id"=> "fa-cart-arrow-down", "text"=> "fa-cart-arrow-down" ],
            [ "id"=> "fa-cart-plus", "text"=> "fa-cart-plus" ],
            [ "id"=> "fa-cc", "text"=> "fa-cc" ],
            [ "id"=> "fa-cc-amex", "text"=> "fa-cc-amex" ],
            [ "id"=> "fa-cc-diners-club", "text"=> "fa-cc-diners-club" ],
            [ "id"=> "fa-cc-discover", "text"=> "fa-cc-discover" ],
            [ "id"=> "fa-cc-jcb", "text"=> "fa-cc-jcb" ],
            [ "id"=> "fa-cc-mastercard", "text"=> "fa-cc-mastercard" ],
            [ "id"=> "fa-cc-paypal", "text"=> "fa-cc-paypal" ],
            [ "id"=> "fa-cc-stripe", "text"=> "fa-cc-stripe" ],
            [ "id"=> "fa-cc-visa", "text"=> "fa-cc-visa" ],
            [ "id"=> "fa-certificate", "text"=> "fa-certificate" ],
            [ "id"=> "fa-chain", "text"=> "fa-chain" ],
            [ "id"=> "fa-chain-broken", "text"=> "fa-chain-broken" ],
            [ "id"=> "fa-check", "text"=> "fa-check" ],
            [ "id"=> "fa-check-circle", "text"=> "fa-check-circle" ],
            [ "id"=> "fa-check-circle-o", "text"=> "fa-check-circle-o" ],
            [ "id"=> "fa-check-square", "text"=> "fa-check-square" ],
            [ "id"=> "fa-check-square-o", "text"=> "fa-check-square-o" ],
            [ "id"=> "fa-chevron-circle-down", "text"=> "fa-chevron-circle-down" ],
            [ "id"=> "fa-chevron-circle-left", "text"=> "fa-chevron-circle-left" ],
            [ "id"=> "fa-chevron-circle-right", "text"=> "fa-chevron-circle-right" ],
            [ "id"=> "fa-chevron-circle-up", "text"=> "fa-chevron-circle-up" ],
            [ "id"=> "fa-chevron-down", "text"=> "fa-chevron-down" ],
            [ "id"=> "fa-chevron-left", "text"=> "fa-chevron-left" ],
            [ "id"=> "fa-chevron-right", "text"=> "fa-chevron-right" ],
            [ "id"=> "fa-chevron-up", "text"=> "fa-chevron-up" ],
            [ "id"=> "fa-child", "text"=> "fa-child" ],
            [ "id"=> "fa-chrome", "text"=> "fa-chrome" ],
            [ "id"=> "fa-circle", "text"=> "fa-circle" ],
            [ "id"=> "fa-circle-o", "text"=> "fa-circle-o" ],
            [ "id"=> "fa-circle-o-notch", "text"=> "fa-circle-o-notch" ],
            [ "id"=> "fa-circle-thin", "text"=> "fa-circle-thin" ],
            [ "id"=> "fa-clipboard", "text"=> "fa-clipboard" ],
            [ "id"=> "fa-clock-o", "text"=> "fa-clock-o" ],
            [ "id"=> "fa-clone", "text"=> "fa-clone" ],
            [ "id"=> "fa-close", "text"=> "fa-close" ],
            [ "id"=> "fa-cloud", "text"=> "fa-cloud" ],
            [ "id"=> "fa-cloud-download", "text"=> "fa-cloud-download" ],
            [ "id"=> "fa-cloud-upload", "text"=> "fa-cloud-upload" ],
            [ "id"=> "fa-cny", "text"=> "fa-cny" ],
            [ "id"=> "fa-code", "text"=> "fa-code" ],
            [ "id"=> "fa-code-fork", "text"=> "fa-code-fork" ],
            [ "id"=> "fa-codepen", "text"=> "fa-codepen" ],
            [ "id"=> "fa-codiepie", "text"=> "fa-codiepie" ],
            [ "id"=> "fa-coffee", "text"=> "fa-coffee" ],
            [ "id"=> "fa-cog", "text"=> "fa-cog" ],
            [ "id"=> "fa-cogs", "text"=> "fa-cogs" ],
            [ "id"=> "fa-columns", "text"=> "fa-columns" ],
            [ "id"=> "fa-comment", "text"=> "fa-comment" ],
            [ "id"=> "fa-comment-o", "text"=> "fa-comment-o" ],
            [ "id"=> "fa-commenting", "text"=> "fa-commenting" ],
            [ "id"=> "fa-commenting-o", "text"=> "fa-commenting-o" ],
            [ "id"=> "fa-comments", "text"=> "fa-comments" ],
            [ "id"=> "fa-comments-o", "text"=> "fa-comments-o" ],
            [ "id"=> "fa-compass", "text"=> "fa-compass" ],
            [ "id"=> "fa-compress", "text"=> "fa-compress" ],
            [ "id"=> "fa-connectdevelop", "text"=> "fa-connectdevelop" ],
            [ "id"=> "fa-contao", "text"=> "fa-contao" ],
            [ "id"=> "fa-copy", "text"=> "fa-copy" ],
            [ "id"=> "fa-copyright", "text"=> "fa-copyright" ],
            [ "id"=> "fa-creative-commons", "text"=> "fa-creative-commons" ],
            [ "id"=> "fa-credit-card", "text"=> "fa-credit-card" ],
            [ "id"=> "fa-credit-card-alt", "text"=> "fa-credit-card-alt" ],
            [ "id"=> "fa-crop", "text"=> "fa-crop" ],
            [ "id"=> "fa-crosshairs", "text"=> "fa-crosshairs" ],
            [ "id"=> "fa-css3", "text"=> "fa-css3" ],
            [ "id"=> "fa-cube", "text"=> "fa-cube" ],
            [ "id"=> "fa-cubes", "text"=> "fa-cubes" ],
            [ "id"=> "fa-cut", "text"=> "fa-cut" ],
            [ "id"=> "fa-cutlery", "text"=> "fa-cutlery" ],
            [ "id"=> "fa-dashboard", "text"=> "fa-dashboard" ],
            [ "id"=> "fa-dashcube", "text"=> "fa-dashcube" ],
            [ "id"=> "fa-database", "text"=> "fa-database" ],
            [ "id"=> "fa-deaf", "text"=> "fa-deaf" ],
            [ "id"=> "fa-deafness", "text"=> "fa-deafness" ],
            [ "id"=> "fa-dedent", "text"=> "fa-dedent" ],
            [ "id"=> "fa-delicious", "text"=> "fa-delicious" ],
            [ "id"=> "fa-desktop", "text"=> "fa-desktop" ],
            [ "id"=> "fa-deviantart", "text"=> "fa-deviantart" ],
            [ "id"=> "fa-diamond", "text"=> "fa-diamond" ],
            [ "id"=> "fa-digg", "text"=> "fa-digg" ],
            [ "id"=> "fa-dollar", "text"=> "fa-dollar" ],
            [ "id"=> "fa-dot-circle-o", "text"=> "fa-dot-circle-o" ],
            [ "id"=> "fa-download", "text"=> "fa-download" ],
            [ "id"=> "fa-dribbble", "text"=> "fa-dribbble" ],
            [ "id"=> "fa-drivers-license", "text"=> "fa-drivers-license" ],
            [ "id"=> "fa-drivers-license-o", "text"=> "fa-drivers-license-o" ],
            [ "id"=> "fa-dropbox", "text"=> "fa-dropbox" ],
            [ "id"=> "fa-drupal", "text"=> "fa-drupal" ],
            [ "id"=> "fa-edge", "text"=> "fa-edge" ],
            [ "id"=> "fa-edit", "text"=> "fa-edit" ],
            [ "id"=> "fa-eercast", "text"=> "fa-eercast" ],
            [ "id"=> "fa-eject", "text"=> "fa-eject" ],
            [ "id"=> "fa-ellipsis-h", "text"=> "fa-ellipsis-h" ],
            [ "id"=> "fa-ellipsis-v", "text"=> "fa-ellipsis-v" ],
            [ "id"=> "fa-empire", "text"=> "fa-empire" ],
            [ "id"=> "fa-envelope", "text"=> "fa-envelope" ],
            [ "id"=> "fa-envelope-o", "text"=> "fa-envelope-o" ],
            [ "id"=> "fa-envelope-open", "text"=> "fa-envelope-open" ],
            [ "id"=> "fa-envelope-open-o", "text"=> "fa-envelope-open-o" ],
            [ "id"=> "fa-envelope-square", "text"=> "fa-envelope-square" ],
            [ "id"=> "fa-envira", "text"=> "fa-envira" ],
            [ "id"=> "fa-eraser", "text"=> "fa-eraser" ],
            [ "id"=> "fa-etsy", "text"=> "fa-etsy" ],
            [ "id"=> "fa-eur", "text"=> "fa-eur" ],
            [ "id"=> "fa-euro", "text"=> "fa-euro" ],
            [ "id"=> "fa-exchange", "text"=> "fa-exchange" ],
            [ "id"=> "fa-exclamation", "text"=> "fa-exclamation" ],
            [ "id"=> "fa-exclamation-circle", "text"=> "fa-exclamation-circle" ],
            [ "id"=> "fa-exclamation-triangle", "text"=> "fa-exclamation-triangle" ],
            [ "id"=> "fa-expand", "text"=> "fa-expand" ],
            [ "id"=> "fa-expeditedssl", "text"=> "fa-expeditedssl" ],
            [ "id"=> "fa-external-link", "text"=> "fa-external-link" ],
            [ "id"=> "fa-external-link-square", "text"=> "fa-external-link-square" ],
            [ "id"=> "fa-eye", "text"=> "fa-eye" ],
            [ "id"=> "fa-eye-slash", "text"=> "fa-eye-slash" ],
            [ "id"=> "fa-eyedropper", "text"=> "fa-eyedropper" ],
            [ "id"=> "fa-fa", "text"=> "fa-fa" ],
            [ "id"=> "fa-facebook", "text"=> "fa-facebook" ],
            [ "id"=> "fa-facebook-f", "text"=> "fa-facebook-f" ],
            [ "id"=> "fa-facebook-official", "text"=> "fa-facebook-official" ],
            [ "id"=> "fa-facebook-square", "text"=> "fa-facebook-square" ],
            [ "id"=> "fa-fast-backward", "text"=> "fa-fast-backward" ],
            [ "id"=> "fa-fast-forward", "text"=> "fa-fast-forward" ],
            [ "id"=> "fa-fax", "text"=> "fa-fax" ],
            [ "id"=> "fa-feed", "text"=> "fa-feed" ],
            [ "id"=> "fa-female", "text"=> "fa-female" ],
            [ "id"=> "fa-fighter-jet", "text"=> "fa-fighter-jet" ],
            [ "id"=> "fa-file", "text"=> "fa-file" ],
            [ "id"=> "fa-file-archive-o", "text"=> "fa-file-archive-o" ],
            [ "id"=> "fa-file-audio-o", "text"=> "fa-file-audio-o" ],
            [ "id"=> "fa-file-code-o", "text"=> "fa-file-code-o" ],
            [ "id"=> "fa-file-excel-o", "text"=> "fa-file-excel-o" ],
            [ "id"=> "fa-file-image-o", "text"=> "fa-file-image-o" ],
            [ "id"=> "fa-file-movie-o", "text"=> "fa-file-movie-o" ],
            [ "id"=> "fa-file-o", "text"=> "fa-file-o" ],
            [ "id"=> "fa-file-pdf-o", "text"=> "fa-file-pdf-o" ],
            [ "id"=> "fa-file-photo-o", "text"=> "fa-file-photo-o" ],
            [ "id"=> "fa-file-picture-o", "text"=> "fa-file-picture-o" ],
            [ "id"=> "fa-file-powerpoint-o", "text"=> "fa-file-powerpoint-o" ],
            [ "id"=> "fa-file-sound-o", "text"=> "fa-file-sound-o" ],
            [ "id"=> "fa-file-text", "text"=> "fa-file-text" ],
            [ "id"=> "fa-file-text-o", "text"=> "fa-file-text-o" ],
            [ "id"=> "fa-file-video-o", "text"=> "fa-file-video-o" ],
            [ "id"=> "fa-file-word-o", "text"=> "fa-file-word-o" ],
            [ "id"=> "fa-file-zip-o", "text"=> "fa-file-zip-o" ],
            [ "id"=> "fa-files-o", "text"=> "fa-files-o" ],
            [ "id"=> "fa-film", "text"=> "fa-film" ],
            [ "id"=> "fa-filter", "text"=> "fa-filter" ],
            [ "id"=> "fa-fire", "text"=> "fa-fire" ],
            [ "id"=> "fa-fire-extinguisher", "text"=> "fa-fire-extinguisher" ],
            [ "id"=> "fa-firefox", "text"=> "fa-firefox" ],
            [ "id"=> "fa-first-order", "text"=> "fa-first-order" ],
            [ "id"=> "fa-flag", "text"=> "fa-flag" ],
            [ "id"=> "fa-flag-checkered", "text"=> "fa-flag-checkered" ],
            [ "id"=> "fa-flag-o", "text"=> "fa-flag-o" ],
            [ "id"=> "fa-flash", "text"=> "fa-flash" ],
            [ "id"=> "fa-flask", "text"=> "fa-flask" ],
            [ "id"=> "fa-flickr", "text"=> "fa-flickr" ],
            [ "id"=> "fa-floppy-o", "text"=> "fa-floppy-o" ],
            [ "id"=> "fa-folder", "text"=> "fa-folder" ],
            [ "id"=> "fa-folder-o", "text"=> "fa-folder-o" ],
            [ "id"=> "fa-folder-open", "text"=> "fa-folder-open" ],
            [ "id"=> "fa-folder-open-o", "text"=> "fa-folder-open-o" ],
            [ "id"=> "fa-font", "text"=> "fa-font" ],
            [ "id"=> "fa-font-awesome", "text"=> "fa-font-awesome" ],
            [ "id"=> "fa-fonticons", "text"=> "fa-fonticons" ],
            [ "id"=> "fa-fort-awesome", "text"=> "fa-fort-awesome" ],
            [ "id"=> "fa-forumbee", "text"=> "fa-forumbee" ],
            [ "id"=> "fa-forward", "text"=> "fa-forward" ],
            [ "id"=> "fa-foursquare", "text"=> "fa-foursquare" ],
            [ "id"=> "fa-free-code-camp", "text"=> "fa-free-code-camp" ],
            [ "id"=> "fa-frown-o", "text"=> "fa-frown-o" ],
            [ "id"=> "fa-futbol-o", "text"=> "fa-futbol-o" ],
            [ "id"=> "fa-gamepad", "text"=> "fa-gamepad" ],
            [ "id"=> "fa-gavel", "text"=> "fa-gavel" ],
            [ "id"=> "fa-gbp", "text"=> "fa-gbp" ],
            [ "id"=> "fa-ge", "text"=> "fa-ge" ],
            [ "id"=> "fa-gear", "text"=> "fa-gear" ],
            [ "id"=> "fa-gears", "text"=> "fa-gears" ],
            [ "id"=> "fa-genderless", "text"=> "fa-genderless" ],
            [ "id"=> "fa-get-pocket", "text"=> "fa-get-pocket" ],
            [ "id"=> "fa-gg", "text"=> "fa-gg" ],
            [ "id"=> "fa-gg-circle", "text"=> "fa-gg-circle" ],
            [ "id"=> "fa-gift", "text"=> "fa-gift" ],
            [ "id"=> "fa-git", "text"=> "fa-git" ],
            [ "id"=> "fa-git-square", "text"=> "fa-git-square" ],
            [ "id"=> "fa-github", "text"=> "fa-github" ],
            [ "id"=> "fa-github-alt", "text"=> "fa-github-alt" ],
            [ "id"=> "fa-github-square", "text"=> "fa-github-square" ],
            [ "id"=> "fa-gitlab", "text"=> "fa-gitlab" ],
            [ "id"=> "fa-gittip", "text"=> "fa-gittip" ],
            [ "id"=> "fa-glass", "text"=> "fa-glass" ],
            [ "id"=> "fa-glide", "text"=> "fa-glide" ],
            [ "id"=> "fa-glide-g", "text"=> "fa-glide-g" ],
            [ "id"=> "fa-globe", "text"=> "fa-globe" ],
            [ "id"=> "fa-google", "text"=> "fa-google" ],
            [ "id"=> "fa-google-plus", "text"=> "fa-google-plus" ],
            [ "id"=> "fa-google-plus-circle", "text"=> "fa-google-plus-circle" ],
            [ "id"=> "fa-google-plus-official", "text"=> "fa-google-plus-official" ],
            [ "id"=> "fa-google-plus-square", "text"=> "fa-google-plus-square" ],
            [ "id"=> "fa-google-wallet", "text"=> "fa-google-wallet" ],
            [ "id"=> "fa-graduation-cap", "text"=> "fa-graduation-cap" ],
            [ "id"=> "fa-gratipay", "text"=> "fa-gratipay" ],
            [ "id"=> "fa-grav", "text"=> "fa-grav" ],
            [ "id"=> "fa-group", "text"=> "fa-group" ],
            [ "id"=> "fa-h-square", "text"=> "fa-h-square" ],
            [ "id"=> "fa-hacker-news", "text"=> "fa-hacker-news" ],
            [ "id"=> "fa-hand-grab-o", "text"=> "fa-hand-grab-o" ],
            [ "id"=> "fa-hand-lizard-o", "text"=> "fa-hand-lizard-o" ],
            [ "id"=> "fa-hand-o-down", "text"=> "fa-hand-o-down" ],
            [ "id"=> "fa-hand-o-left", "text"=> "fa-hand-o-left" ],
            [ "id"=> "fa-hand-o-right", "text"=> "fa-hand-o-right" ],
            [ "id"=> "fa-hand-o-up", "text"=> "fa-hand-o-up" ],
            [ "id"=> "fa-hand-paper-o", "text"=> "fa-hand-paper-o" ],
            [ "id"=> "fa-hand-peace-o", "text"=> "fa-hand-peace-o" ],
            [ "id"=> "fa-hand-pointer-o", "text"=> "fa-hand-pointer-o" ],
            [ "id"=> "fa-hand-rock-o", "text"=> "fa-hand-rock-o" ],
            [ "id"=> "fa-hand-scissors-o", "text"=> "fa-hand-scissors-o" ],
            [ "id"=> "fa-hand-spock-o", "text"=> "fa-hand-spock-o" ],
            [ "id"=> "fa-hand-stop-o", "text"=> "fa-hand-stop-o" ],
            [ "id"=> "fa-handshake-o", "text"=> "fa-handshake-o" ],
            [ "id"=> "fa-hard-of-hearing", "text"=> "fa-hard-of-hearing" ],
            [ "id"=> "fa-hashtag", "text"=> "fa-hashtag" ],
            [ "id"=> "fa-hdd-o", "text"=> "fa-hdd-o" ],
            [ "id"=> "fa-header", "text"=> "fa-header" ],
            [ "id"=> "fa-headphones", "text"=> "fa-headphones" ],
            [ "id"=> "fa-heart", "text"=> "fa-heart" ],
            [ "id"=> "fa-heart-o", "text"=> "fa-heart-o" ],
            [ "id"=> "fa-heartbeat", "text"=> "fa-heartbeat" ],
            [ "id"=> "fa-history", "text"=> "fa-history" ],
            [ "id"=> "fa-home", "text"=> "fa-home" ],
            [ "id"=> "fa-hospital-o", "text"=> "fa-hospital-o" ],
            [ "id"=> "fa-hotel", "text"=> "fa-hotel" ],
            [ "id"=> "fa-hourglass", "text"=> "fa-hourglass" ],
            [ "id"=> "fa-hourglass-1", "text"=> "fa-hourglass-1" ],
            [ "id"=> "fa-hourglass-2", "text"=> "fa-hourglass-2" ],
            [ "id"=> "fa-hourglass-3", "text"=> "fa-hourglass-3" ],
            [ "id"=> "fa-hourglass-end", "text"=> "fa-hourglass-end" ],
            [ "id"=> "fa-hourglass-half", "text"=> "fa-hourglass-half" ],
            [ "id"=> "fa-hourglass-o", "text"=> "fa-hourglass-o" ],
            [ "id"=> "fa-hourglass-start", "text"=> "fa-hourglass-start" ],
            [ "id"=> "fa-houzz", "text"=> "fa-houzz" ],
            [ "id"=> "fa-html5", "text"=> "fa-html5" ],
            [ "id"=> "fa-i-cursor", "text"=> "fa-i-cursor" ],
            [ "id"=> "fa-id-badge", "text"=> "fa-id-badge" ],
            [ "id"=> "fa-id-card", "text"=> "fa-id-card" ],
            [ "id"=> "fa-id-card-o", "text"=> "fa-id-card-o" ],
            [ "id"=> "fa-ils", "text"=> "fa-ils" ],
            [ "id"=> "fa-image", "text"=> "fa-image" ],
            [ "id"=> "fa-imdb", "text"=> "fa-imdb" ],
            [ "id"=> "fa-inbox", "text"=> "fa-inbox" ],
            [ "id"=> "fa-indent", "text"=> "fa-indent" ],
            [ "id"=> "fa-industry", "text"=> "fa-industry" ],
            [ "id"=> "fa-info", "text"=> "fa-info" ],
            [ "id"=> "fa-info-circle", "text"=> "fa-info-circle" ],
            [ "id"=> "fa-inr", "text"=> "fa-inr" ],
            [ "id"=> "fa-instagram", "text"=> "fa-instagram" ],
            [ "id"=> "fa-institution", "text"=> "fa-institution" ],
            [ "id"=> "fa-internet-explorer", "text"=> "fa-internet-explorer" ],
            [ "id"=> "fa-intersex", "text"=> "fa-intersex" ],
            [ "id"=> "fa-ioxhost", "text"=> "fa-ioxhost" ],
            [ "id"=> "fa-italic", "text"=> "fa-italic" ],
            [ "id"=> "fa-joomla", "text"=> "fa-joomla" ],
            [ "id"=> "fa-jpy", "text"=> "fa-jpy" ],
            [ "id"=> "fa-jsfiddle", "text"=> "fa-jsfiddle" ],
            [ "id"=> "fa-key", "text"=> "fa-key" ],
            [ "id"=> "fa-keyboard-o", "text"=> "fa-keyboard-o" ],
            [ "id"=> "fa-krw", "text"=> "fa-krw" ],
            [ "id"=> "fa-language", "text"=> "fa-language" ],
            [ "id"=> "fa-laptop", "text"=> "fa-laptop" ],
            [ "id"=> "fa-lastfm", "text"=> "fa-lastfm" ],
            [ "id"=> "fa-lastfm-square", "text"=> "fa-lastfm-square" ],
            [ "id"=> "fa-leaf", "text"=> "fa-leaf" ],
            [ "id"=> "fa-leanpub", "text"=> "fa-leanpub" ],
            [ "id"=> "fa-legal", "text"=> "fa-legal" ],
            [ "id"=> "fa-lemon-o", "text"=> "fa-lemon-o" ],
            [ "id"=> "fa-level-down", "text"=> "fa-level-down" ],
            [ "id"=> "fa-level-up", "text"=> "fa-level-up" ],
            [ "id"=> "fa-life-bouy", "text"=> "fa-life-bouy" ],
            [ "id"=> "fa-life-buoy", "text"=> "fa-life-buoy" ],
            [ "id"=> "fa-life-ring", "text"=> "fa-life-ring" ],
            [ "id"=> "fa-life-saver", "text"=> "fa-life-saver" ],
            [ "id"=> "fa-lightbulb-o", "text"=> "fa-lightbulb-o" ],
            [ "id"=> "fa-line-chart", "text"=> "fa-line-chart" ],
            [ "id"=> "fa-link", "text"=> "fa-link" ],
            [ "id"=> "fa-linkedin", "text"=> "fa-linkedin" ],
            [ "id"=> "fa-linkedin-square", "text"=> "fa-linkedin-square" ],
            [ "id"=> "fa-linode", "text"=> "fa-linode" ],
            [ "id"=> "fa-linux", "text"=> "fa-linux" ],
            [ "id"=> "fa-list", "text"=> "fa-list" ],
            [ "id"=> "fa-list-alt", "text"=> "fa-list-alt" ],
            [ "id"=> "fa-list-ol", "text"=> "fa-list-ol" ],
            [ "id"=> "fa-list-ul", "text"=> "fa-list-ul" ],
            [ "id"=> "fa-location-arrow", "text"=> "fa-location-arrow" ],
            [ "id"=> "fa-lock", "text"=> "fa-lock" ],
            [ "id"=> "fa-long-arrow-down", "text"=> "fa-long-arrow-down" ],
            [ "id"=> "fa-long-arrow-left", "text"=> "fa-long-arrow-left" ],
            [ "id"=> "fa-long-arrow-right", "text"=> "fa-long-arrow-right" ],
            [ "id"=> "fa-long-arrow-up", "text"=> "fa-long-arrow-up" ],
            [ "id"=> "fa-low-vision", "text"=> "fa-low-vision" ],
            [ "id"=> "fa-magic", "text"=> "fa-magic" ],
            [ "id"=> "fa-magnet", "text"=> "fa-magnet" ],
            [ "id"=> "fa-mail-forward", "text"=> "fa-mail-forward" ],
            [ "id"=> "fa-mail-reply", "text"=> "fa-mail-reply" ],
            [ "id"=> "fa-mail-reply-all", "text"=> "fa-mail-reply-all" ],
            [ "id"=> "fa-male", "text"=> "fa-male" ],
            [ "id"=> "fa-map", "text"=> "fa-map" ],
            [ "id"=> "fa-map-marker", "text"=> "fa-map-marker" ],
            [ "id"=> "fa-map-o", "text"=> "fa-map-o" ],
            [ "id"=> "fa-map-pin", "text"=> "fa-map-pin" ],
            [ "id"=> "fa-map-signs", "text"=> "fa-map-signs" ],
            [ "id"=> "fa-mars", "text"=> "fa-mars" ],
            [ "id"=> "fa-mars-double", "text"=> "fa-mars-double" ],
            [ "id"=> "fa-mars-stroke", "text"=> "fa-mars-stroke" ],
            [ "id"=> "fa-mars-stroke-h", "text"=> "fa-mars-stroke-h" ],
            [ "id"=> "fa-mars-stroke-v", "text"=> "fa-mars-stroke-v" ],
            [ "id"=> "fa-maxcdn", "text"=> "fa-maxcdn" ],
            [ "id"=> "fa-meanpath", "text"=> "fa-meanpath" ],
            [ "id"=> "fa-medium", "text"=> "fa-medium" ],
            [ "id"=> "fa-medkit", "text"=> "fa-medkit" ],
            [ "id"=> "fa-meetup", "text"=> "fa-meetup" ],
            [ "id"=> "fa-meh-o", "text"=> "fa-meh-o" ],
            [ "id"=> "fa-mercury", "text"=> "fa-mercury" ],
            [ "id"=> "fa-microchip", "text"=> "fa-microchip" ],
            [ "id"=> "fa-microphone", "text"=> "fa-microphone" ],
            [ "id"=> "fa-microphone-slash", "text"=> "fa-microphone-slash" ],
            [ "id"=> "fa-minus", "text"=> "fa-minus" ],
            [ "id"=> "fa-minus-circle", "text"=> "fa-minus-circle" ],
            [ "id"=> "fa-minus-square", "text"=> "fa-minus-square" ],
            [ "id"=> "fa-minus-square-o", "text"=> "fa-minus-square-o" ],
            [ "id"=> "fa-mixcloud", "text"=> "fa-mixcloud" ],
            [ "id"=> "fa-mobile", "text"=> "fa-mobile" ],
            [ "id"=> "fa-mobile-phone", "text"=> "fa-mobile-phone" ],
            [ "id"=> "fa-modx", "text"=> "fa-modx" ],
            [ "id"=> "fa-money", "text"=> "fa-money" ],
            [ "id"=> "fa-moon-o", "text"=> "fa-moon-o" ],
            [ "id"=> "fa-mortar-board", "text"=> "fa-mortar-board" ],
            [ "id"=> "fa-motorcycle", "text"=> "fa-motorcycle" ],
            [ "id"=> "fa-mouse-pointer", "text"=> "fa-mouse-pointer" ],
            [ "id"=> "fa-music", "text"=> "fa-music" ],
            [ "id"=> "fa-navicon", "text"=> "fa-navicon" ],
            [ "id"=> "fa-neuter", "text"=> "fa-neuter" ],
            [ "id"=> "fa-newspaper-o", "text"=> "fa-newspaper-o" ],
            [ "id"=> "fa-object-group", "text"=> "fa-object-group" ],
            [ "id"=> "fa-object-ungroup", "text"=> "fa-object-ungroup" ],
            [ "id"=> "fa-odnoklassniki", "text"=> "fa-odnoklassniki" ],
            [ "id"=> "fa-odnoklassniki-square", "text"=> "fa-odnoklassniki-square" ],
            [ "id"=> "fa-opencart", "text"=> "fa-opencart" ],
            [ "id"=> "fa-openid", "text"=> "fa-openid" ],
            [ "id"=> "fa-opera", "text"=> "fa-opera" ],
            [ "id"=> "fa-optin-monster", "text"=> "fa-optin-monster" ],
            [ "id"=> "fa-outdent", "text"=> "fa-outdent" ],
            [ "id"=> "fa-pagelines", "text"=> "fa-pagelines" ],
            [ "id"=> "fa-paint-brush", "text"=> "fa-paint-brush" ],
            [ "id"=> "fa-paper-plane", "text"=> "fa-paper-plane" ],
            [ "id"=> "fa-paper-plane-o", "text"=> "fa-paper-plane-o" ],
            [ "id"=> "fa-paperclip", "text"=> "fa-paperclip" ],
            [ "id"=> "fa-paragraph", "text"=> "fa-paragraph" ],
            [ "id"=> "fa-paste", "text"=> "fa-paste" ],
            [ "id"=> "fa-pause", "text"=> "fa-pause" ],
            [ "id"=> "fa-pause-circle", "text"=> "fa-pause-circle" ],
            [ "id"=> "fa-pause-circle-o", "text"=> "fa-pause-circle-o" ],
            [ "id"=> "fa-paw", "text"=> "fa-paw" ],
            [ "id"=> "fa-paypal", "text"=> "fa-paypal" ],
            [ "id"=> "fa-pencil", "text"=> "fa-pencil" ],
            [ "id"=> "fa-pencil-square", "text"=> "fa-pencil-square" ],
            [ "id"=> "fa-pencil-square-o", "text"=> "fa-pencil-square-o" ],
            [ "id"=> "fa-percent", "text"=> "fa-percent" ],
            [ "id"=> "fa-phone", "text"=> "fa-phone" ],
            [ "id"=> "fa-phone-square", "text"=> "fa-phone-square" ],
            [ "id"=> "fa-photo", "text"=> "fa-photo" ],
            [ "id"=> "fa-picture-o", "text"=> "fa-picture-o" ],
            [ "id"=> "fa-pie-chart", "text"=> "fa-pie-chart" ],
            [ "id"=> "fa-pied-piper", "text"=> "fa-pied-piper" ],
            [ "id"=> "fa-pied-piper-alt", "text"=> "fa-pied-piper-alt" ],
            [ "id"=> "fa-pied-piper-pp", "text"=> "fa-pied-piper-pp" ],
            [ "id"=> "fa-pinterest", "text"=> "fa-pinterest" ],
            [ "id"=> "fa-pinterest-p", "text"=> "fa-pinterest-p" ],
            [ "id"=> "fa-pinterest-square", "text"=> "fa-pinterest-square" ],
            [ "id"=> "fa-plane", "text"=> "fa-plane" ],
            [ "id"=> "fa-play", "text"=> "fa-play" ],
            [ "id"=> "fa-play-circle", "text"=> "fa-play-circle" ],
            [ "id"=> "fa-play-circle-o", "text"=> "fa-play-circle-o" ],
            [ "id"=> "fa-plug", "text"=> "fa-plug" ],
            [ "id"=> "fa-plus", "text"=> "fa-plus" ],
            [ "id"=> "fa-plus-circle", "text"=> "fa-plus-circle" ],
            [ "id"=> "fa-plus-square", "text"=> "fa-plus-square" ],
            [ "id"=> "fa-plus-square-o", "text"=> "fa-plus-square-o" ],
            [ "id"=> "fa-podcast", "text"=> "fa-podcast" ],
            [ "id"=> "fa-power-off", "text"=> "fa-power-off" ],
            [ "id"=> "fa-print", "text"=> "fa-print" ],
            [ "id"=> "fa-product-hunt", "text"=> "fa-product-hunt" ],
            [ "id"=> "fa-puzzle-piece", "text"=> "fa-puzzle-piece" ],
            [ "id"=> "fa-qq", "text"=> "fa-qq" ],
            [ "id"=> "fa-qrcode", "text"=> "fa-qrcode" ],
            [ "id"=> "fa-question", "text"=> "fa-question" ],
            [ "id"=> "fa-question-circle", "text"=> "fa-question-circle" ],
            [ "id"=> "fa-question-circle-o", "text"=> "fa-question-circle-o" ],
            [ "id"=> "fa-quora", "text"=> "fa-quora" ],
            [ "id"=> "fa-quote-left", "text"=> "fa-quote-left" ],
            [ "id"=> "fa-quote-right", "text"=> "fa-quote-right" ],
            [ "id"=> "fa-ra", "text"=> "fa-ra" ],
            [ "id"=> "fa-random", "text"=> "fa-random" ],
            [ "id"=> "fa-ravelry", "text"=> "fa-ravelry" ],
            [ "id"=> "fa-rebel", "text"=> "fa-rebel" ],
            [ "id"=> "fa-recycle", "text"=> "fa-recycle" ],
            [ "id"=> "fa-reddit", "text"=> "fa-reddit" ],
            [ "id"=> "fa-reddit-alien", "text"=> "fa-reddit-alien" ],
            [ "id"=> "fa-reddit-square", "text"=> "fa-reddit-square" ],
            [ "id"=> "fa-refresh", "text"=> "fa-refresh" ],
            [ "id"=> "fa-registered", "text"=> "fa-registered" ],
            [ "id"=> "fa-remove", "text"=> "fa-remove" ],
            [ "id"=> "fa-renren", "text"=> "fa-renren" ],
            [ "id"=> "fa-reorder", "text"=> "fa-reorder" ],
            [ "id"=> "fa-repeat", "text"=> "fa-repeat" ],
            [ "id"=> "fa-reply", "text"=> "fa-reply" ],
            [ "id"=> "fa-reply-all", "text"=> "fa-reply-all" ],
            [ "id"=> "fa-resistance", "text"=> "fa-resistance" ],
            [ "id"=> "fa-retweet", "text"=> "fa-retweet" ],
            [ "id"=> "fa-rmb", "text"=> "fa-rmb" ],
            [ "id"=> "fa-road", "text"=> "fa-road" ],
            [ "id"=> "fa-rocket", "text"=> "fa-rocket" ],
            [ "id"=> "fa-rotate-left", "text"=> "fa-rotate-left" ],
            [ "id"=> "fa-rotate-right", "text"=> "fa-rotate-right" ],
            [ "id"=> "fa-rouble", "text"=> "fa-rouble" ],
            [ "id"=> "fa-rss", "text"=> "fa-rss" ],
            [ "id"=> "fa-rss-square", "text"=> "fa-rss-square" ],
            [ "id"=> "fa-rub", "text"=> "fa-rub" ],
            [ "id"=> "fa-ruble", "text"=> "fa-ruble" ],
            [ "id"=> "fa-rupee", "text"=> "fa-rupee" ],
            [ "id"=> "fa-s15", "text"=> "fa-s15" ],
            [ "id"=> "fa-safari", "text"=> "fa-safari" ],
            [ "id"=> "fa-save", "text"=> "fa-save" ],
            [ "id"=> "fa-scissors", "text"=> "fa-scissors" ],
            [ "id"=> "fa-scribd", "text"=> "fa-scribd" ],
            [ "id"=> "fa-search", "text"=> "fa-search" ],
            [ "id"=> "fa-search-minus", "text"=> "fa-search-minus" ],
            [ "id"=> "fa-search-plus", "text"=> "fa-search-plus" ],
            [ "id"=> "fa-sellsy", "text"=> "fa-sellsy" ],
            [ "id"=> "fa-send", "text"=> "fa-send" ],
            [ "id"=> "fa-send-o", "text"=> "fa-send-o" ],
            [ "id"=> "fa-server", "text"=> "fa-server" ],
            [ "id"=> "fa-share", "text"=> "fa-share" ],
            [ "id"=> "fa-share-alt", "text"=> "fa-share-alt" ],
            [ "id"=> "fa-share-alt-square", "text"=> "fa-share-alt-square" ],
            [ "id"=> "fa-share-square", "text"=> "fa-share-square" ],
            [ "id"=> "fa-share-square-o", "text"=> "fa-share-square-o" ],
            [ "id"=> "fa-shekel", "text"=> "fa-shekel" ],
            [ "id"=> "fa-sheqel", "text"=> "fa-sheqel" ],
            [ "id"=> "fa-shield", "text"=> "fa-shield" ],
            [ "id"=> "fa-ship", "text"=> "fa-ship" ],
            [ "id"=> "fa-shirtsinbulk", "text"=> "fa-shirtsinbulk" ],
            [ "id"=> "fa-shopping-bag", "text"=> "fa-shopping-bag" ],
            [ "id"=> "fa-shopping-basket", "text"=> "fa-shopping-basket" ],
            [ "id"=> "fa-shopping-cart", "text"=> "fa-shopping-cart" ],
            [ "id"=> "fa-shower", "text"=> "fa-shower" ],
            [ "id"=> "fa-sign-in", "text"=> "fa-sign-in" ],
            [ "id"=> "fa-sign-language", "text"=> "fa-sign-language" ],
            [ "id"=> "fa-sign-out", "text"=> "fa-sign-out" ],
            [ "id"=> "fa-signal", "text"=> "fa-signal" ],
            [ "id"=> "fa-signing", "text"=> "fa-signing" ],
            [ "id"=> "fa-simplybuilt", "text"=> "fa-simplybuilt" ],
            [ "id"=> "fa-sitemap", "text"=> "fa-sitemap" ],
            [ "id"=> "fa-skyatlas", "text"=> "fa-skyatlas" ],
            [ "id"=> "fa-skype", "text"=> "fa-skype" ],
            [ "id"=> "fa-slack", "text"=> "fa-slack" ],
            [ "id"=> "fa-sliders", "text"=> "fa-sliders" ],
            [ "id"=> "fa-slideshare", "text"=> "fa-slideshare" ],
            [ "id"=> "fa-smile-o", "text"=> "fa-smile-o" ],
            [ "id"=> "fa-snapchat", "text"=> "fa-snapchat" ],
            [ "id"=> "fa-snapchat-ghost", "text"=> "fa-snapchat-ghost" ],
            [ "id"=> "fa-snapchat-square", "text"=> "fa-snapchat-square" ],
            [ "id"=> "fa-snowflake-o", "text"=> "fa-snowflake-o" ],
            [ "id"=> "fa-soccer-ball-o", "text"=> "fa-soccer-ball-o" ],
            [ "id"=> "fa-sort", "text"=> "fa-sort" ],
            [ "id"=> "fa-sort-alpha-asc", "text"=> "fa-sort-alpha-asc" ],
            [ "id"=> "fa-sort-alpha-desc", "text"=> "fa-sort-alpha-desc" ],
            [ "id"=> "fa-sort-amount-asc", "text"=> "fa-sort-amount-asc" ],
            [ "id"=> "fa-sort-amount-desc", "text"=> "fa-sort-amount-desc" ],
            [ "id"=> "fa-sort-asc", "text"=> "fa-sort-asc" ],
            [ "id"=> "fa-sort-desc", "text"=> "fa-sort-desc" ],
            [ "id"=> "fa-sort-down", "text"=> "fa-sort-down" ],
            [ "id"=> "fa-sort-numeric-asc", "text"=> "fa-sort-numeric-asc" ],
            [ "id"=> "fa-sort-numeric-desc", "text"=> "fa-sort-numeric-desc" ],
            [ "id"=> "fa-sort-up", "text"=> "fa-sort-up" ],
            [ "id"=> "fa-soundcloud", "text"=> "fa-soundcloud" ],
            [ "id"=> "fa-space-shuttle", "text"=> "fa-space-shuttle" ],
            [ "id"=> "fa-spinner", "text"=> "fa-spinner" ],
            [ "id"=> "fa-spoon", "text"=> "fa-spoon" ],
            [ "id"=> "fa-spotify", "text"=> "fa-spotify" ],
            [ "id"=> "fa-square", "text"=> "fa-square" ],
            [ "id"=> "fa-square-o", "text"=> "fa-square-o" ],
            [ "id"=> "fa-stack-exchange", "text"=> "fa-stack-exchange" ],
            [ "id"=> "fa-stack-overflow", "text"=> "fa-stack-overflow" ],
            [ "id"=> "fa-star", "text"=> "fa-star" ],
            [ "id"=> "fa-star-half", "text"=> "fa-star-half" ],
            [ "id"=> "fa-star-half-empty", "text"=> "fa-star-half-empty" ],
            [ "id"=> "fa-star-half-full", "text"=> "fa-star-half-full" ],
            [ "id"=> "fa-star-half-o", "text"=> "fa-star-half-o" ],
            [ "id"=> "fa-star-o", "text"=> "fa-star-o" ],
            [ "id"=> "fa-steam", "text"=> "fa-steam" ],
            [ "id"=> "fa-steam-square", "text"=> "fa-steam-square" ],
            [ "id"=> "fa-step-backward", "text"=> "fa-step-backward" ],
            [ "id"=> "fa-step-forward", "text"=> "fa-step-forward" ],
            [ "id"=> "fa-stethoscope", "text"=> "fa-stethoscope" ],
            [ "id"=> "fa-sticky-note", "text"=> "fa-sticky-note" ],
            [ "id"=> "fa-sticky-note-o", "text"=> "fa-sticky-note-o" ],
            [ "id"=> "fa-stop", "text"=> "fa-stop" ],
            [ "id"=> "fa-stop-circle", "text"=> "fa-stop-circle" ],
            [ "id"=> "fa-stop-circle-o", "text"=> "fa-stop-circle-o" ],
            [ "id"=> "fa-street-view", "text"=> "fa-street-view" ],
            [ "id"=> "fa-strikethrough", "text"=> "fa-strikethrough" ],
            [ "id"=> "fa-stumbleupon", "text"=> "fa-stumbleupon" ],
            [ "id"=> "fa-stumbleupon-circle", "text"=> "fa-stumbleupon-circle" ],
            [ "id"=> "fa-subscript", "text"=> "fa-subscript" ],
            [ "id"=> "fa-subway", "text"=> "fa-subway" ],
            [ "id"=> "fa-suitcase", "text"=> "fa-suitcase" ],
            [ "id"=> "fa-sun-o", "text"=> "fa-sun-o" ],
            [ "id"=> "fa-superpowers", "text"=> "fa-superpowers" ],
            [ "id"=> "fa-superscript", "text"=> "fa-superscript" ],
            [ "id"=> "fa-support", "text"=> "fa-support" ],
            [ "id"=> "fa-table", "text"=> "fa-table" ],
            [ "id"=> "fa-tablet", "text"=> "fa-tablet" ],
            [ "id"=> "fa-tachometer", "text"=> "fa-tachometer" ],
            [ "id"=> "fa-tag", "text"=> "fa-tag" ],
            [ "id"=> "fa-tags", "text"=> "fa-tags" ],
            [ "id"=> "fa-tasks", "text"=> "fa-tasks" ],
            [ "id"=> "fa-taxi", "text"=> "fa-taxi" ],
            [ "id"=> "fa-telegram", "text"=> "fa-telegram" ],
            [ "id"=> "fa-television", "text"=> "fa-television" ],
            [ "id"=> "fa-tencent-weibo", "text"=> "fa-tencent-weibo" ],
            [ "id"=> "fa-terminal", "text"=> "fa-terminal" ],
            [ "id"=> "fa-text-height", "text"=> "fa-text-height" ],
            [ "id"=> "fa-text-width", "text"=> "fa-text-width" ],
            [ "id"=> "fa-th", "text"=> "fa-th" ],
            [ "id"=> "fa-th-large", "text"=> "fa-th-large" ],
            [ "id"=> "fa-th-list", "text"=> "fa-th-list" ],
            [ "id"=> "fa-themeisle", "text"=> "fa-themeisle" ],
            [ "id"=> "fa-thermometer", "text"=> "fa-thermometer" ],
            [ "id"=> "fa-thermometer-0", "text"=> "fa-thermometer-0" ],
            [ "id"=> "fa-thermometer-1", "text"=> "fa-thermometer-1" ],
            [ "id"=> "fa-thermometer-2", "text"=> "fa-thermometer-2" ],
            [ "id"=> "fa-thermometer-3", "text"=> "fa-thermometer-3" ],
            [ "id"=> "fa-thermometer-4", "text"=> "fa-thermometer-4" ],
            [ "id"=> "fa-thermometer-empty", "text"=> "fa-thermometer-empty" ],
            [ "id"=> "fa-thermometer-full", "text"=> "fa-thermometer-full" ],
            [ "id"=> "fa-thermometer-half", "text"=> "fa-thermometer-half" ],
            [ "id"=> "fa-thermometer-quarter", "text"=> "fa-thermometer-quarter" ],
            [ "id"=> "fa-thermometer-three-quarters", "text"=> "fa-thermometer-three-quarters" ],
            [ "id"=> "fa-thumb-tack", "text"=> "fa-thumb-tack" ],
            [ "id"=> "fa-thumbs-down", "text"=> "fa-thumbs-down" ],
            [ "id"=> "fa-thumbs-o-down", "text"=> "fa-thumbs-o-down" ],
            [ "id"=> "fa-thumbs-o-up", "text"=> "fa-thumbs-o-up" ],
            [ "id"=> "fa-thumbs-up", "text"=> "fa-thumbs-up" ],
            [ "id"=> "fa-ticket", "text"=> "fa-ticket" ],
            [ "id"=> "fa-times", "text"=> "fa-times" ],
            [ "id"=> "fa-times-circle", "text"=> "fa-times-circle" ],
            [ "id"=> "fa-times-circle-o", "text"=> "fa-times-circle-o" ],
            [ "id"=> "fa-times-rectangle", "text"=> "fa-times-rectangle" ],
            [ "id"=> "fa-times-rectangle-o", "text"=> "fa-times-rectangle-o" ],
            [ "id"=> "fa-tint", "text"=> "fa-tint" ],
            [ "id"=> "fa-toggle-down", "text"=> "fa-toggle-down" ],
            [ "id"=> "fa-toggle-left", "text"=> "fa-toggle-left" ],
            [ "id"=> "fa-toggle-off", "text"=> "fa-toggle-off" ],
            [ "id"=> "fa-toggle-on", "text"=> "fa-toggle-on" ],
            [ "id"=> "fa-toggle-right", "text"=> "fa-toggle-right" ],
            [ "id"=> "fa-toggle-up", "text"=> "fa-toggle-up" ],
            [ "id"=> "fa-trademark", "text"=> "fa-trademark" ],
            [ "id"=> "fa-train", "text"=> "fa-train" ],
            [ "id"=> "fa-transgender", "text"=> "fa-transgender" ],
            [ "id"=> "fa-transgender-alt", "text"=> "fa-transgender-alt" ],
            [ "id"=> "fa-trash", "text"=> "fa-trash" ],
            [ "id"=> "fa-trash-o", "text"=> "fa-trash-o" ],
            [ "id"=> "fa-tree", "text"=> "fa-tree" ],
            [ "id"=> "fa-trello", "text"=> "fa-trello" ],
            [ "id"=> "fa-tripadvisor", "text"=> "fa-tripadvisor" ],
            [ "id"=> "fa-trophy", "text"=> "fa-trophy" ],
            [ "id"=> "fa-truck", "text"=> "fa-truck" ],
            [ "id"=> "fa-try", "text"=> "fa-try" ],
            [ "id"=> "fa-tty", "text"=> "fa-tty" ],
            [ "id"=> "fa-tumblr", "text"=> "fa-tumblr" ],
            [ "id"=> "fa-tumblr-square", "text"=> "fa-tumblr-square" ],
            [ "id"=> "fa-turkish-lira", "text"=> "fa-turkish-lira" ],
            [ "id"=> "fa-tv", "text"=> "fa-tv" ],
            [ "id"=> "fa-twitch", "text"=> "fa-twitch" ],
            [ "id"=> "fa-twitter", "text"=> "fa-twitter" ],
            [ "id"=> "fa-twitter-square", "text"=> "fa-twitter-square" ],
            [ "id"=> "fa-umbrella", "text"=> "fa-umbrella" ],
            [ "id"=> "fa-underline", "text"=> "fa-underline" ],
            [ "id"=> "fa-undo", "text"=> "fa-undo" ],
            [ "id"=> "fa-universal-access", "text"=> "fa-universal-access" ],
            [ "id"=> "fa-university", "text"=> "fa-university" ],
            [ "id"=> "fa-unlink", "text"=> "fa-unlink" ],
            [ "id"=> "fa-unlock", "text"=> "fa-unlock" ],
            [ "id"=> "fa-unlock-alt", "text"=> "fa-unlock-alt" ],
            [ "id"=> "fa-unsorted", "text"=> "fa-unsorted" ],
            [ "id"=> "fa-upload", "text"=> "fa-upload" ],
            [ "id"=> "fa-usb", "text"=> "fa-usb" ],
            [ "id"=> "fa-usd", "text"=> "fa-usd" ],
            [ "id"=> "fa-user", "text"=> "fa-user" ],
            [ "id"=> "fa-user-circle", "text"=> "fa-user-circle" ],
            [ "id"=> "fa-user-circle-o", "text"=> "fa-user-circle-o" ],
            [ "id"=> "fa-user-md", "text"=> "fa-user-md" ],
            [ "id"=> "fa-user-o", "text"=> "fa-user-o" ],
            [ "id"=> "fa-user-plus", "text"=> "fa-user-plus" ],
            [ "id"=> "fa-user-secret", "text"=> "fa-user-secret" ],
            [ "id"=> "fa-user-times", "text"=> "fa-user-times" ],
            [ "id"=> "fa-users", "text"=> "fa-users" ],
            [ "id"=> "fa-vcard", "text"=> "fa-vcard" ],
            [ "id"=> "fa-vcard-o", "text"=> "fa-vcard-o" ],
            [ "id"=> "fa-venus", "text"=> "fa-venus" ],
            [ "id"=> "fa-venus-double", "text"=> "fa-venus-double" ],
            [ "id"=> "fa-venus-mars", "text"=> "fa-venus-mars" ],
            [ "id"=> "fa-viacoin", "text"=> "fa-viacoin" ],
            [ "id"=> "fa-viadeo", "text"=> "fa-viadeo" ],
            [ "id"=> "fa-viadeo-square", "text"=> "fa-viadeo-square" ],
            [ "id"=> "fa-video-camera", "text"=> "fa-video-camera" ],
            [ "id"=> "fa-vimeo", "text"=> "fa-vimeo" ],
            [ "id"=> "fa-vimeo-square", "text"=> "fa-vimeo-square" ],
            [ "id"=> "fa-vine", "text"=> "fa-vine" ],
            [ "id"=> "fa-vk", "text"=> "fa-vk" ],
            [ "id"=> "fa-volume-control-phone", "text"=> "fa-volume-control-phone" ],
            [ "id"=> "fa-volume-down", "text"=> "fa-volume-down" ],
            [ "id"=> "fa-volume-off", "text"=> "fa-volume-off" ],
            [ "id"=> "fa-volume-up", "text"=> "fa-volume-up" ],
            [ "id"=> "fa-warning", "text"=> "fa-warning" ],
            [ "id"=> "fa-wechat", "text"=> "fa-wechat" ],
            [ "id"=> "fa-weibo", "text"=> "fa-weibo" ],
            [ "id"=> "fa-weixin", "text"=> "fa-weixin" ],
            [ "id"=> "fa-whatsapp", "text"=> "fa-whatsapp" ],
            [ "id"=> "fa-wheelchair", "text"=> "fa-wheelchair" ],
            [ "id"=> "fa-wheelchair-alt", "text"=> "fa-wheelchair-alt" ],
            [ "id"=> "fa-wifi", "text"=> "fa-wifi" ],
            [ "id"=> "fa-wikipedia-w", "text"=> "fa-wikipedia-w" ],
            [ "id"=> "fa-window-close", "text"=> "fa-window-close" ],
            [ "id"=> "fa-window-close-o", "text"=> "fa-window-close-o" ],
            [ "id"=> "fa-window-maximize", "text"=> "fa-window-maximize" ],
            [ "id"=> "fa-window-minimize", "text"=> "fa-window-minimize" ],
            [ "id"=> "fa-window-restore", "text"=> "fa-window-restore" ],
            [ "id"=> "fa-windows", "text"=> "fa-windows" ],
            [ "id"=> "fa-won", "text"=> "fa-won" ],
            [ "id"=> "fa-wordpress", "text"=> "fa-wordpress" ],
            [ "id"=> "fa-wpbeginner", "text"=> "fa-wpbeginner" ],
            [ "id"=> "fa-wpexplorer", "text"=> "fa-wpexplorer" ],
            [ "id"=> "fa-wpforms", "text"=> "fa-wpforms" ],
            [ "id"=> "fa-wrench", "text"=> "fa-wrench" ],
            [ "id"=> "fa-xing", "text"=> "fa-xing" ],
            [ "id"=> "fa-xing-square", "text"=> "fa-xing-square" ],
            [ "id"=> "fa-y-combinator", "text"=> "fa-y-combinator" ],
            [ "id"=> "fa-y-combinator-square", "text"=> "fa-y-combinator-square" ],
            [ "id"=> "fa-yahoo", "text"=> "fa-yahoo" ],
            [ "id"=> "fa-yc", "text"=> "fa-yc" ],
            [ "id"=> "fa-yc-square", "text"=> "fa-yc-square" ],
            [ "id"=> "fa-yelp", "text"=> "fa-yelp" ],
            [ "id"=> "fa-yen", "text"=> "fa-yen" ],
            [ "id"=> "fa-yoast", "text"=> "fa-yoast" ],
            [ "id"=> "fa-youtube", "text"=> "fa-youtube" ],
            [ "id"=> "fa-youtube-play", "text"=> "fa-youtube-play" ],
            [ "id"=> "fa-youtube-square", "text"=> "fa-youtube-square" ],
        ];
            
        $array = collect($DATA_ICONS);
        foreach ($array as $key => $value) {
            DB::table('conico')->insert(['conicotdesc'=> $value['text']]);
        }
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
            $img->resize(350, 235);
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
                $confrm->confrmvsmai = "";
                $confrm->confrmvsmai = "fa ".$request->confrmvsmai;
                $confrm->confrmsfcod = 2;
                $confrm->confrmyadmf = $request->confrmyadmf;
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
