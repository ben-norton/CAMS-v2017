<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssetProject extends Model
{
    protected $table = 'assets_projects';
    protected $guarded = ['id'];
    protected $dates = ['created_at', 'updated_at'];

    public function assets()
    {
        return $this->hasMany('App\Asset', 'asset_id');
    }
    public function projects()
    {
        return $this->hasMany('App\Project', 'project_id');
    }

}
