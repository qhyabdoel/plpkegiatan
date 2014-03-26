<?php

class Infokegiatan extends Eloquent
{
	public function savewith($pelkegiatan_id, $kalendar_id)
	{
		$this->pelkegiatan_id = $pelkegiatan_id;
		$this->kalendar_id = $kalendar_id;
		$this->save();
	}

	public function pelkegiatan()
	{
		return $this->belongsTo('Pelkegiatan');
	}

	public function kalendar()
	{
		return $this->belongsTo('Kalendar');
	}
}