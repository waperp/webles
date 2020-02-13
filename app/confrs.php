<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class confrs extends Model
{
    public $timestamps  = false;
    protected $primaryKey = 'confrsscode';
    protected $table = 'confrs';
    public static function gallery(){
        return static::orderBy('confrsscode','DESC')->take(6)->get();
    }
    public static function childrens($confrmscode)
    {
        return static::where('confrmscode', $confrmscode)->get();
    }
}
