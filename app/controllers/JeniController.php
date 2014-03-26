<?php

class JeniController extends BaseController
{
	public function getIndex()
	{
		return View::make('Jeni.index')->with('jenis', Jeni::all());
	}	

	public function getAdd()
	{
		if(Jeni::all()->count()==0)
		{
			$level = 1;
		}
		else
		{
			$level = Jeni::max('level')+1;
		}

		return View::make('Jeni.add', array('level' => $level));
	}

	public function postAdd()
	{
		$jeni = new Jeni;
		$jeni->nama = Input::get('nama');
		$jeni->level = Input::get('level');
		$jeni->save();

		return Redirect::to('jenis');
	}

	public function getEdit($id)
	{
		$jeni = Jeni::find($id);

		return View::make('Jeni.add')->with('jeni', $jeni);
	}

	public function postEdit()
	{
		$jeni = Jeni::find(Input::get('id'));

		$jeni->nama = Input::get('nama');
		$jeni->save();

		return Redirect::to('jenis');
	}

	public function getHapus()
	{
		return View::make('Jeni.hapus');
	}

	public function postHapus()
	{
		Jeni::find(Jeni::max('id'))->delete();

		return Redirect::to('jenis');
	}
}