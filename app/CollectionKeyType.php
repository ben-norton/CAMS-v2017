<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CollectionKeyType extends Model
{
    protected $table = 'collection_key_types';
    protected $guarded = ['id'];
    protected $dates = ['created_at', 'updated_at'];

    public function keys()
    {
        return $this->hasMany('App\CollectionKey','key_type_id');
    }
}
