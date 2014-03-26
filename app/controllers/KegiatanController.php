<?php

class KegiatanController extends BaseController 
{
	public function getIndex()
	{
		if(isset($_COOKIE['user_id']))
		{			
			$hakakses = User::find($_COOKIE['user_id'])->hakakses()->where('peran', 2);			

			$count = $hakakses->count();

			if($hakakses->count() == 1)
			{								
				Catatan::where('dokumen_id', null)->delete();				

				$kegiatans = $hakakses->first()->perkas->kegiatans;

				return View::make('Kegiatan.form')->with('kegiatans', $kegiatans);
			}
			else
			{
				return View::make('User.tidakizin');
			}	
		}
		else
		{
			return View::make('User.tidakizin');
		}
	}

	public function getApprove($id)
	{			
		$dokumen = Dokumen::find($id);

		$catatans = Catatan::where('dokumen_id', $id)->orderBy('created_at', 'desc')->get();		

		return View::make('Kegiatan.formapp',array('dokumen' => $dokumen, 'catatans' => $catatans));		
	}

	public function getEdit($id)
	{
		$kegiatans = User::find($_COOKIE['user_id'])->hakakses()->where('peran', 2)->first()->perkas->kegiatans;	

		$dokumen = Dokumen::find($id);

		$catatans = Catatan::where('dokumen_id', $id)->orderBy('created_at', 'desc')->get();

		$jeni = Jeni::where('level', Jeni::min('level'))->first();

		$count = $dokumen->pelkegiatan->dokumens()->where('jeni_id', '<>', $jeni->id)->count();

		if($count==0)
		{
			return View::make('Kegiatan.form',array('kegiatans' => $kegiatans, 
				'dokumen' => $dokumen, 'catatans' => $catatans));		
		}		
		else
		{
			return View::make('Kegiatan.formadd',array('kegiatans' => $kegiatans, 
				'dokumen' => $dokumen, 'catatans' => $catatans));		
		}			
	}	

	public function getAdd()
	{								
		$pelkegiatans = User::find($_COOKIE['user_id'])->hakakses()->where('peran', 2)->first()->perkas->pelkegiatans();

		foreach ($pelkegiatans as $pelkegiatan) 
		{
			Catatan::where('dokumen_id', null)->delete();

			$count = $pelkegiatan->dokumens()->where('status', 3)->count();

			if($count==0)
			{
				$pelknotfinal = $pelkegiatan;
			}
		}

		return View::make('Kegiatan.formadd',array('pelkegiatan' => $pelknotfinal));				
	}

	public function getDaftar()
	{
		return View::make('Kegiatan.daftar');
	}

	public function getHalaman()
	{
		$count = Kegiatan::all()->count();

		if($count==0)
		{
			return Redirect::to('dokumens/kosong');
		}
		else
		{
			View::composer('Kegiatan.daftar2', function($view)
			{
				$kegiatans = Kegiatan::paginate(5);
				$max = Kegiatan::max('id');
				$min = Kegiatan::min('id');

				$view->with('kegiatans', $kegiatans);
				$view->with('max', $max);
				$view->with('min', $min);
			});			

			return View::make('Kegiatan.daftar2');
		}
	}		

	public function postNama()
	{				
		$nama = Input::get('nama');

		$count = User::find($_COOKIE['user_id'])->hakakses()->where('peran', 2)->first()
		->perkas->kegiatans()->where('title', $nama)->count();		

		if($count==0)
		{
			return Response::json(array('deskripsi' => 'kosong'));
		}
		else
		{
			$deskripsi = Kegiatan::where('title', $nama)->first()->detail;

			return Response::json(array('deskripsi' => $deskripsi));
		}		
	}	

	public function getCek1()
	{
		$perka = User::find($_COOKIE['user_id'])->hakakses()->where('peran', 2)->first()->perkas;

		$count = count($perka->pelkegiatans());		
		
		if($count==0)
		{
			$count = 1;
		}
		else
		{
			$count = Pelkegiatan::find(max($perka->pelkegiatancol('id')))->dokumens()->where('status', 3)->count();	
		}		

		return Response::json(array('cek' => $count));
	}
}