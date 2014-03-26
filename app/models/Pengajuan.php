<?php

class Pengajuan extends Eloquent
{
	public function level()
	{
		return $this->belongsTo('Level');
	}
	
	public function approver()
	{
		return $this->belongsTo('Approver');
	}

	public function jalur()
	{
		return $this->belongsTo('Jalur');
	}
}
