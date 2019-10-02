<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class navigation extends Model
{
    protected $table = 'confrm';

    public function parent() {

        return $this->hasOne('confrm', 'confrmscode', 'confrmsfcod');

    }

    public function children() {

        return $this->hasMany('confrm', 'confrmsfcod', 'confrmscode');

    }  

    public static function tree() {

        return static::with(implode('.', array_fill(0, 4, 'children')))->where('confrmsfcod', '=', NULL)->get();

    }
}
