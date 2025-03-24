<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CollectionKey extends Model
{
    protected $table = 'collection_keys';
    protected $guarded = ['id'];
    protected $dates = ['created_at', 'updated_at'];

    public function asset()
    {
        return $this->belongsTo('App\Asset','asset_id');
    }
    public function collection()
    {
        return $this->belongsTo('App\Collection', 'collection_id');
    }
    public function keyType()
    {
        return $this->belongsTo('App\CollectionKeyType','key_type_id');
    }
}
