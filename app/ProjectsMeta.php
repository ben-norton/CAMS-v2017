<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Phoenix\EloquentMeta\Meta;

class ProjectsMeta extends Meta
{
    protected $table = "projects_meta";

    public function metakey()
    {
        return $this->belongsTo('MetadataKeys', 'metakey_id');
    }
}
