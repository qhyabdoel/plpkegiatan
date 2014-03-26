<?php

class Level extends Eloquent
{
	public function dokumens()
	{
		return $this->hasMany('Dokumen');
	}
}