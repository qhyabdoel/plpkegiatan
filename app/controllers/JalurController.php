<?php

class JalurController extends BaseController
{
	public function getIndex()
	{
		return View::make('Jalur.index')->with('jalurs', Jalur::all());
	}

	public function getAdd()	
	{
		return View::make('Jalur.add', array('perkas' => Perka::all()));
	}

	public function postAdd()
	{
		$jalur = new Jalur;
		$jalur->perka_id = Input::get('perkaid');
		$jalur->save();		

		return Redirect::to('jalurs');
	}	

	public function getHapus($id)
	{
		return View::make('Jalur.hapus')->with('id', $id);
	}

	public function postHapus()
	{
		Jalur::find(Input::get('id'))->delete();

		return Redirect::to('jalurs');
	}

	public function getLihat($jalur_id, $jeni_id)
	{		
		$count = Jalur::find($jalur_id)->pengajuans()->where('jeni_id', $jeni_id)->count();

		$pengajuans = Jalur::find($jalur_id)->pengajuans()->where('jeni_id', $jeni_id)->get();

		return View::make('Jalur.lihat', array('pengajuans' => $pengajuans, 'count' => $count, 'jalur_id' => $jalur_id, 
			'jeni_id' => $jeni_id));
	}

	public function getLihats($id)
	{
		return View::make('Jalur.lihats', array('jenis' => Jeni::all(), 'id' => $id));
	}

	public function postCek()
	{
		$jalur = User::where('name', 'DKM')->first()->hakakses()->where('peran', 2)->first()->perkas->jalurs;

		if(!isset($jalur))
		{
			$count = 'kosong';
		}
		else
		{
			$count = $jalur->pengajuans()->where('jeni_id', Input::get('jeni'))->count();

			if($count==0)
			{
				$count='kosong';
			}
			else
			{
				$count="isi";
			}
		}

		return Response::json(array('count' => $count));
	}
}