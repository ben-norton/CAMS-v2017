<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IanaType extends Model
{
    protected $table = 'iana_types';
    protected $guarded = ['id'];
    protected $dates = ['created_at', 'updated_at'];

    public function mediaType()
    {
        return $this->belongsTo('App\MediaType');
    }
}
