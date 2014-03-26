<?php

class Kalendar extends Eloquent
{
	public function infokegiatans()
	{
		return $this->hasMany('Infokegiatan');
	}

	public function savewith($tanggal)
	{
		$this->tanggal = $tanggal;
		$this->save();
	}
}