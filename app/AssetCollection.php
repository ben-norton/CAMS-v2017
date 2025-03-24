<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssetCollection extends Model
{
    protected $table = 'assets_collections';
    protected $guarded = ['id'];
    protected $dates = ['created_at', 'updated_at'];

    public function assets()
    {
        return $this->hasMany('App\Asset', 'asset_id');
    }
    public function collections()
    {
        return $this->hasMany('App\Collection', 'collection_id');
    }

}
