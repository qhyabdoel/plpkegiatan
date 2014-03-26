<?php

class Kegiatan extends Eloquent
{
	public function pelkegiatans()
	{
		return $this->hasMany('Pelkegiatan');
	}

	public function perka()
	{		
		return $this->belongsTo('Perka');		
	}

	public function savewith($perka_id, $title, $detail)
	{
		$this->perka_id = $perka_id;
		$this->title = $title;
		$this->detail = $detail;
		$this->save();
	}	
}