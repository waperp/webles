<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class confrm extends Model
{
    protected $table = 'confrm';

    public function parent() {

        return $this->hasOne('App\confrm', 'confrmscode', 'confrmsfcod')->orderBy('confrmyorde','asc');

    }

    public function children() {

        return $this->hasMany('App\confrm', 'confrmsfcod', 'confrmscode')->orderBy('confrmyorde','asc');

    }  

    public static function tree() {

        return static::with(implode('.', array_fill(0, 4, 'children')))->where('confrmsfcod', '=', NULL)->orderBy('confrmyorde','asc')->get();

    }

}
