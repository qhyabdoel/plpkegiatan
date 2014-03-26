<?php

class Perka extends Eloquent
{
	public function kegiatans()
	{
		return $this->hasMany('Kegiatan');
	}

	public function hakakse()
	{
		return $this->belongsTo('Hakakse');
	}

	public function jalurs()
	{
		return $this->hasOne('Jalur');
	}

	public function pelkegiatans()
	{
		$kegiatans = $this->kegiatans;

		$i = 0;

		$isi = array();

		foreach ($kegiatans as $kegiatan) 
		{
			$pelkegiatans = $kegiatan->pelkegiatans;

			foreach ($pelkegiatans as $pelkegiatan) 
			{
				$isi[$i] = $pelkegiatan;

				$i++;				
			}			
		}

		return $isi;	
	}

	public function pelkegiatancol($column)
	{
		$isi = array();

		$i = 0;

		foreach ($this->pelkegiatans()  as $pelkegiatan) 
		{
			$isi[$i] = $pelkegiatan->$column;

			$i++;
		}		

		return $isi;
	}

	public function dokumens()
	{
		$pelkegiatans = $this->pelkegiatans();

		$i = 0;

		$isi = array();

		foreach ($pelkegiatans as $pelkegiatan) 
		{				
			$dokumens = $pelkegiatan->dokumens;

			foreach ($dokumens as $dokumen) 
			{
				$isi[$i] = $dokumen;

				$i++;
			}

		}

		return $isi;
	}

	public function kegiatannotfinal()
	{
		$isi = array();

		$i = 0;				

		foreach ($this->kegiatans()->get() as $kegiatan) 
		{			
			foreach ($kegiatan->pelkegiatans()->get() as $pelkegiatan) 
			{				
				$jeni_id = Jeni::where('level', Jeni::min('level'))->first()->id;

				$count = $pelkegiatan->dokumens()->where('jeni_id', $jeni_id)->where('status', 2)->count();

				if($count==0)
				{
					$isi[$i] = $kegiatan;

					$i++;
				}				
			}	
		}

		return $isi;		
	}
}