<?php

class Jeni extends Eloquent
{
	public function dokumens()
	{
		return $this->hasMany('Dokumen');
	}
}