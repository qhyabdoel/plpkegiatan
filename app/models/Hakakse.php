<?php

class Hakakse extends Eloquent
{	
	public function perkas()
	{
		return $this->hasOne('Perka');
	}

	public function approvers()
	{
		return $this->hasOne('Approver');
	}

	public function user()
	{
		return $this->belongsTo('User');
	}
}