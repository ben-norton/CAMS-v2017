<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CollectionStat extends Model
{
    protected $table = 'collection_stats';
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
