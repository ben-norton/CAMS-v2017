<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Phoenix\EloquentMeta\Meta;

class CollectionsMeta extends Meta
{
    protected $table = "collections_meta";

    public function metakey()
    {
        return $this->belongsTo('MetadataKeys', 'metakey_id');
    }
}
