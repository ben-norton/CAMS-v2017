<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MetadataKeys extends Model
{
    protected $table = 'metadata_keys';
    protected $guarded = ['id'];
    protected $dates = ['created_at', 'updated_at'];

    public function assetMeta()
    {
        return $this->hasMany('App\AssetsMeta');
    }
    public function projectMeta()
    {
        return $this->hasMany('App\ProjectsMeta');
    }
    public function collectionMeta()
    {
        return $this->hasMany('App\CollectionsMeta');
    }
    public static function getKeysByModel($model){
        return MetadataKeys::where('model','=',$model)->get();
    }
}
