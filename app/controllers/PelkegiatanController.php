<?php

class PelkegiatanController extends BaseController 
{
	public function getIndex()
	{
		return View::make('Pelkegiatan.daftar3');
	}

	public function getDaftar()
	{
		$pelkegiatans = Pelkegiatan::all();
		
		return View::make('Pelkegiatan.daftar2')->with('pelkegiatans', $pelkegiatans);
	}
}