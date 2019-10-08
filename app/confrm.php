<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class confrm extends Model
{
    protected $table = 'confrm';

    public function parent() {

        return $this->hasOne('App\confrm', 'confrmscode', 'confrmsfcod')->where('confrmbenbl',1)->orderBy('confrmyorde','asc');

    }

    public function children() {

        return $this->hasMany('App\confrm', 'confrmsfcod', 'confrmscode')->where('confrmbenbl',1)->orderBy('confrmyorde','asc');

    }  

    public static function tree() {

        return static::with(implode('.', array_fill(0, 4, 'children')))->where('confrmbenbl',1)->where('confrmsfcod', '=', NULL)->where('confrmyadmf',0)->orderBy('confrmyorde','asc')->get();

    }
    public static function treeAdmin() {

        return static::with(implode('.', array_fill(0, 4, 'children')))->where('confrmbenbl',1)->where('confrmsfcod', '=', NULL)->orderBy('confrmyorde','asc')->get();

    }
    public static function nivel($confrmscode){
        return static::where('confrmscode',$confrmscode)->first();
    }
    public static function childrens($confrmsfcod){
        return static::where('confrmsfcod',$confrmsfcod)->get();
    }
}
