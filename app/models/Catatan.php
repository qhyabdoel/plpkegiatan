<?php

class Catatan extends Eloquent
{
	public function user()
	{
		return $this->belongsTo('User');
	}

	public function dokumen()
	{
		return $this->belongsTo('Dokumen');
	}
}