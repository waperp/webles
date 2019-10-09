<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class confrs extends Model
{
    public $timestamps  = false;
    protected $primaryKey = 'confrsscode';
    protected $table = 'confrs';
}
