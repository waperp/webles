<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class confrm extends Model
{
    protected $table = 'confrm';
    public $timestamps  = false;
    protected $primaryKey = 'confrmscode';

    public function parent()
    {
        return $this->hasOne('App\confrm', 'confrmscode', 'confrmsfcod')->join('contyp','contypscode','contypscod0')->where('contypsnumt',2)->where('confrmbenbl', 1)->orderBy('confrmyorde', 'asc');
    }
    public function children()
    {
        return $this->hasMany('App\confrm', 'confrmsfcod', 'confrmscode')->join('contyp','contypscode','contypscod0')->where('contypsnumt',2)->where('confrmbenbl', 1)->orderBy('confrmyorde', 'asc');
    }

    public static function tree()
    {
        return static::with(implode('.', array_fill(0, 4, 'children')))->where('confrmbenbl', 1)->where('confrmsfcod', '=', NULL)->where('confrmyadmf', 0)->orderBy('confrmyorde', 'asc')->get();
    }
    public static function treeAdmin()
    {

        return static::with(implode('.', array_fill(0, 4, 'children')))->join('contyp','contypscode','contypscod0')->where('contypsnumt',2)->where('confrmbenbl', 1)->where('confrmsfcod', '=', NULL)->orderBy('confrmyorde', 'asc')->get();
    }
    public function typeConfrm()
    {
        return $this->belongsTo('App\confrm','contypscode','contypscod0')->where('contypsnumt',2);
    }
    public static function nivel($confrmscode)
    {
        return static::where('confrmscode', $confrmscode)->first();
    }
    public static function childrens($confrmsfcod)
    {
        return static::where('confrmsfcod', $confrmsfcod)->get();
    }
   
    public function sections()
    {
        return $this->hasMany(confrs::class,'confrmscode','confrmscode')->orderBy('confrsdpubl','DESC');
    }
    public static function section($confrmscode)
    {
        return static::where('confrmscode', $confrmscode)->orderBy('confrmscode','asc')->first();
    }
    
}
