<?php

namespace App\Model\Event;

use Illuminate\Database\Eloquent\Model;

class BeautyPageant extends Model
{
    //
    protected $guarded = [];

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function is_active()
	{
		if($this->status)
		{
			return true;
		}
		return false;
	}

	public function category()
	{
		return $this->belongsTo('App\Model\Category');
	}

	public function pageantOwner()
	{
		return $this->belongsTo('App\User', 'owner_id');
	}
}
