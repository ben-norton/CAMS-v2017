<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Phoenix\EloquentMeta\Meta;

class AssetsMeta extends Meta
{
    protected $table = "assets_meta";

    public function metakey()
    {
        return $this->belongsTo('MetadataKeys', 'metakey_id');
    }



}
