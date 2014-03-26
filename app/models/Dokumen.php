<?php

class Dokumen extends Eloquent
{
	public function catatan()
	{
		return $this->hasMany('Catatan');
	}

	public function pelkegiatan()
	{
		return $this->belongsTo('Pelkegiatan');
	}

	public function savewith($pelkegiatan_id, $level_id, $status, $jeni_id)
	{
		$this->pelkegiatan_id = $pelkegiatan_id;
		$this->level_id = $level_id;
		$this->status = $status;
		$this->jeni_id = $jeni_id;
		$this->save();
	}

	public function level()
	{
		return $this->belongsTo('Level');
	}

	public function notifs()
	{
		return $this->hasMany('Notif');
	}

	public function jeni()
	{
		return $this->belongsTo('Jeni');
	}
}