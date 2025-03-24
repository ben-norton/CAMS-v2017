<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Project extends Model
{
    protected $table = 'projects';
    protected $guarded = ['id'];
    protected $dates = ['created_at', 'updated_at'];

    public function assets()
    {
        return $this->belongsToMany('App\Asset', 'assets_projects');
    }

    public static function hasGallery()
    {
        $projects = DB::table('projects')->whereIn('id', function($query) {
                $query->select('project_id')->from('assets_projects');
            })
            ->where('public_yn','=',1)
            ->get();
        return $projects;
    }



}
