<?php

class Approver extends Eloquent
{
	public function approvals()
	{
		return $this->hasMany('Approval');
	}

	public function hakakse()
	{
		return $this->belongsTo('Hakakse');
	}

	public function pengajuans()
	{
		return $this->hasMany('Pengajuan');
	}

	public function dokumens()
	{
		$approvals = $this->approvals;

		$i = 0;

		$isi = array();

		foreach ($approvals as $approval) 
		{
			$dokumens = $approval->perka->dokumens();

			foreach ($dokumens as $dokumen) 
			{
				$isi[$i] = $dokumen;	

				$i++;
			}
		}		

		return $isi;
	}
}