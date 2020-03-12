<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class confrs extends Model
{
    public $timestamps  = false;
    protected $primaryKey = 'confrsscode';
    protected $table = 'confrs';
    public static function gallery(){
        return static::orderBy('confrsscode','DESC')->whereNotIn('confrmscode',[8,9])->take(6)->get();
    }
    public static function gallery_sucursales(){
        return static::join('concoo','concoo.confrsscode','confrs.confrsscode')->where('confrs.confrmscode',19)->get();
    }
    public static function childrens($confrmscode)
    {
        return static::where('confrmscode', $confrmscode)->get();
    }
}
