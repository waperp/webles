<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
// use Laravel\Passport\HasApiTokens;

class secusr extends Authenticatable
{
    // use HasApiTokens;
    public $timestamps  = false;
    protected $primaryKey = 'secusricode';
    protected $table = 'secusr';
    protected $fillable = [
        'secconnuuid',
        'secusrtpass',
        'secusrtmail',
        'secusrdregu',
        'secusrdvalu',
        'constascode',
        'contypscode',
        'secusrbenbl',
        'hurempicode',
    ];
    protected $searchable = [
        'secusrtmail'
    ];
    protected $hidden = ['secusrtpass', 'remember_token'];

    public function getDateFormat()
    {
        return "d/m/Y H:i:s";
    }
    public function getAuthPassword()
    {
        return $this->secusrtpass;
    }
    
    public function username()
    {
        return $this->secusrtmail;
    }
    public function scopeEmployee($query)
    {
        return $query
            ->join('huremp', 'secusr.hurempicode', 'huremp.hurempicode')
            ->where('secusr.secusricode', $this->secusricode)->first();
    }
    public function scopeMembership($query)
    {
        return $query->select('conmem.*')
            ->join('plainf', 'plainf.plainficode', 'secusr.plainficode')
            ->join('conmem', 'conmem.conmemscode', 'plainf.conmemscode')
            ->where('plainf.plainficode', Auth::user()->plainficode)->first();
    }
    public function scopeIsAdmin($query)
    {
        $data = $query->select('secusr.contypscode')
            ->where('secusr.plainficode', Auth::user()->plainficode)
            ->first();
        return $data->contypscode;
    }

    public function scopeSearch($query, $term)
    {
        $columns = implode(',', $this->searchable);

        $searchableTerm = $this->fullTextWildcards($term);

        return $query->selectRaw("MATCH ({$columns}) AGAINST (? IN NATURAL LANGUAGE MODE WITH QUERY EXPANSION) AS relevance_score", [$searchableTerm])
            ->whereRaw("MATCH ({$columns}) AGAINST (? IN NATURAL LANGUAGE MODE WITH QUERY EXPANSION)", $searchableTerm)
            ->orderByDesc('relevance_score');
    }
}
