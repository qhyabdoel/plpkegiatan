<?php

class Jalur extends Eloquent
{
	public function pengajuans()
	{
		return $this->hasMany('Pengajuan');
	}
	
	public function perka()
	{
		return $this->belongsTo('Perka');
	}	
}