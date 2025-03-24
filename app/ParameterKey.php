<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParameterKey extends Model
{
    protected $table = 'parameter_keys';
    protected $guarded = ['id'];
    protected $dates = ['created_at', 'updated_at'];

    public function assetType()
    {
        return $this->hasMany('App\AssetType', 'parameter_id');
    }
    public function collectionLink()
    {
        return $this->hasMany('App\CollectionLink', 'parameter_id');
    }
    public function collectionStat()
    {
        return $this->hasMany('App\CollectionStat', 'parameter_id');
    }

    public static function getParametersByType($parameterType){
        return ParameterKey::where('parameter_type','=',$parameterType)->get();
    }
}
