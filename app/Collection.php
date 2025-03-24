<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Collection extends Model
{
    protected $table = 'collections';
    protected $guarded = ['id'];
    protected $dates = ['created_at', 'updated_at'];

    public function assets()
    {
        return $this->belongsToMany('App\Asset', 'assets_collections');
    }
    public function stats()
    {
        return $this->hasMany('App\CollectionStat');
    }
    public function links()
    {
        return $this->hasMany('App\CollectionLink');
    }

    public static function hasGallery()
    {
        $collections = DB::table('collections')->whereIn('id', function($query) {
            $query->select('collection_id')->from('collection_keys');
        })->get();
        return $collections;
    }
}
