<?php

class Pelkegiatan extends Eloquent
{
	public function kegiatan()
	{
		return $this->belongsTo('Kegiatan');
	}

	public function dokumens()
	{
		return $this->hasMany('Dokumen');
	}

	public function infokegiatans()
	{
		return $this->hasMany('Infokegiatan');
	}

	public function savewith($kegiatan_id)
	{
		$this->kegiatan_id = $kegiatan_id;
		$this->save();
	}
}