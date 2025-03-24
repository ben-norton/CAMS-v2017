<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class AssetType extends Model
{
    protected $table = 'asset_types';
    protected $guarded = ['id'];
    protected $dates = ['created_at', 'updated_at'];

    public function parameterKey()
    {
        return $this->belongsTo('App\ParameterKey', 'parameter_id');
    }
    public function assets()
    {
        return $this->hasMany('App\Asset','asset_type_id');
    }

    public static function hasGallery()
    {
        $assetTypes = DB::table('asset_types')->whereIn('id', function($query) {
            $query->select('asset_type_id')->from('assets');
        })->get();
        return $assetTypes;
    }
}
