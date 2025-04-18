<?php

namespace App;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
	protected $table = 'roles';
	protected $fillable = ['name', 'display_name', 'description'];

	public function users()
	{
		return $this->belongsToMany('App\User','role_user');
	}
}
