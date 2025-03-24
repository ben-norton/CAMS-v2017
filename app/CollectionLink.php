<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CollectionLink extends Model
{
    protected $table = 'collection_links';
    protected $guarded = ['id'];
    protected $dates = ['created_at', 'updated_at'];

    public function collection()
    {
        return $this->belongsTo('App\Collection');
    }
    public function parameterKey()
    {
        return $this->belongsTo('App\ParameterKey', 'parameter_id');
    }

}
