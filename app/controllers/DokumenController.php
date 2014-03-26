<?php

class DokumenController extends BaseController 
{
	public function postUpload()
	{	
		$id = Input::get('dokumenId1');

		if($id==0)
		{
			Input::file('getFile1')->move('pdf', 'baru.pdf');
		}		
		else
		{
			Input::file('getFile1')->move('pdf', 'baru.pdf');

			copy(public_path().'/pdf/baru.pdf', public_path().'/pdf/'.$id.'.pdf');
		}
	}	
	
	public function getKosong()
	{
		return View::make('Dokumen.Kosong');
	}

	public function postSubmit()
	{		
		set_time_limit(90);
		
		$user = User::find($_COOKIE['user_id']);

		$perka = $user->hakakses()->where('peran', 2)->first()->perkas;

		$nama = Input::get('namaKegiatan');
		$deskripsi = Input::get('deskripsiKegiatan');
		$mulai = Input::get('tanggalAwal');
		$akhir = Input::get('tanggalAkhir');		

		$validNama = Validator::make(array('nama' => $nama), array('nama' => 'exists:kegiatans,title'));
		
		if($validNama->fails())
		{				
			//save code kegiatan
			$kegiatan = new Kegiatan;
			$kegiatan->savewith($perka->id, $nama, $deskripsi);
		}

		$kegiatan_id = Kegiatan::where('title', $nama)->first()->id;

		//save code pelkegiatan
		$pelkegiatan = new Pelkegiatan;
		$pelkegiatan->savewith($kegiatan_id);

		$pelkegiatan_id = Kegiatan::find($kegiatan_id)->pelkegiatans()->max('id');				

		$dMulai = new DateTime($mulai);
		$dAkhir = new DateTime($akhir);

		$selisihTanggal = $dMulai->diff($dAkhir);
		$limit = $selisihTanggal->days;

		$tanggal = $dMulai->sub(new DateInterval('P1D'));	

		for($i=0;$i<=$limit;$i++)
		{			
			$tCounter = $tanggal->add(new DateInterval('P1D'))->format('Y-m-d');

			$validKalen = Validator::make(array('tCounter' => $tCounter), array('tCounter' => 'exists:kalendars,tanggal'));

			if($validKalen->fails())
			{
				//save code kalendar
				$kalendar = new Kalendar;
				$kalendar->savewith($tCounter);
			}						

			$kalendar_id = Kalendar::where('tanggal', $tCounter)->first()->id;

			//save code infokegiatan
			$infokegiatan = new Infokegiatan;
			$infokegiatan->savewith($pelkegiatan_id, $kalendar_id);
		}

		$jeni_id = Jeni::where('level', 1)->first()->id;

		//save code dokumen
		$dokumen = new Dokumen;
		$dokumen->savewith($pelkegiatan_id, 1, 1, $jeni_id);	

		$dokumen_id = Pelkegiatan::find($pelkegiatan_id)->dokumens()->max('id');

		copy(public_path().'/pdf/baru.pdf', public_path().'/pdf/'.$dokumen_id.'.pdf');			

		$catatans = $user->catatans()->where('dokumen_id', null)->get();

		//update catatan			
		foreach ($catatans as $catatan) 
		{
			$catatan->dokumen_id = $dokumen_id;
			$catatan->save();	
		}		

		$notif = new Notif;
		$notif->dokumen_id = $dokumen->id;
		$notif->user_id = $user->id;
		$notif->save();	
		/*$notif->email($dokumen->id,$user->id);*/

		foreach ($perka->jalurs->pengajuans as $pengajuan) 
		{
			$user = $pengajuan->approver->hakakse->user;

			$notifCount = $user->notifs()->where('dokumen_id', $dokumen->id)->where('user_id', $user->id)->count();

			if($notifCount==0)
			{
				$notif = new Notif;
				$notif->dokumen_id = $dokumen->id;
				$notif->user_id = $user->id;
				$notif->save();		
				/*$notif->email($dokumen->id,$user->id);*/
			}
		}		

		return Redirect::to('/perkas/succes');		
	}

	
	public function postApprove()
	{		
		$status = Input::get('status');

		$dokumen = Dokumen::find(Input::get('id'));	
		
		$perka = $dokumen->pelkegiatan->kegiatan->perka;		

		$maxLevel = $perka->jalurs->pengajuans()->where('jeni_id', $dokumen->jeni_id)->max('level_id');		

		$pengajuans = User::find($_COOKIE['user_id'])->hakakses()->where('peran', 3)->first()->approvers->pengajuans()
		->where('jeni_id', $dokumen->jeni_id)->get();

		foreach ($pengajuans as $pengajuan) 
		{
			if($pengajuan->jalur->perka->id==$perka->id)
			{
				$appLevel = $pengajuan->level->id;
			}
		}		

		if($status==1)
		{					
			if($maxLevel==$appLevel)
			{
				$max = Jeni::max('level');				

				if($dokumen->jeni->level==$max)
				{
					$dokumen->status = 3;
					$dokumen->save();
				}
				else
				{
					$dokumen->status = 2;
					$dokumen->save();	
				}
			}
			else
			{
				$dokumen->level_id = $dokumen->level_id+1;
				$dokumen->save();			
			}
		}
		else
		{
			$dokumen->status = 0;
			$dokumen->save();
		}		

		$dokumen->notifs()->delete();		

		$user = $perka->hakakse->user;

		$notif = new Notif;
		$notif->dokumen_id = $dokumen->id;
		$notif->user_id = $user->id;
		$notif->save();		

		foreach ($perka->jalurs->pengajuans as $pengajuan) 
		{
			$user = $pengajuan->approver->hakakse->user;

			$notifCount = $user->notifs()->where('dokumen_id', $dokumen->id)->where('user_id', $user->id)->count();

			if($notifCount==0)
			{
				$notif = new Notif;
				$notif->dokumen_id = $dokumen->id;
				$notif->user_id = $user->id;
				$notif->save();		
			}
		}

		return Redirect::to('/approvers/succes');
	}

	public function postEdit()
	{
		$user = User::find($_COOKIE['user_id']);

		$perka = $user->hakakses()->where('peran', 2)->first()->perkas;

		$nama = Input::get('namaKegiatan');
		$deskripsi = Input::get('deskripsiKegiatan');
		$mulai = Input::get('tanggalAwal');
		$akhir = Input::get('tanggalAkhir');	
		$id = Input::get('id');

		$pelkegiatans = $perka->pelkegiatans();

		foreach (Perka::first()->pelkegiatans() as $pelkegiatan) 
		{
			$count = $pelkegiatan->dokumens()->where('status', 3)->count();

			if($count==0)
			{
				$pelknotfinal = $pelkegiatan;
			}
		}

		$infokegiatans = $pelknotfinal->infokegiatans;

		//hapus infokegiatan lama
		foreach ($infokegiatans as $infokegiatan) 
		{
			$infokegiatan->kalendar->delete();
			$infokegiatan->delete();
		}

		$dMulai = new DateTime($mulai);
		$dAkhir = new DateTime($akhir);

		//simpan infokegiatan baru
		$selisihTanggal = $dMulai->diff($dAkhir);
		$limit = $selisihTanggal->days;

		$tanggal = $dMulai->sub(new DateInterval('P1D'));	

		for($i=0;$i<=$limit;$i++)
		{			
			$tCounter = $tanggal->add(new DateInterval('P1D'))->format('Y-m-d');

			$validKalen = Validator::make(array('tCounter' => $tCounter), array('tCounter' => 'exists:kalendars,tanggal'));

			if($validKalen->fails())
			{
				//save code kalendar
				$kalendar = new Kalendar;
				$kalendar->savewith($tCounter);
			}						

			$kalendar_id = Kalendar::where('tanggal', $tCounter)->first()->id;

			//save code infokegiatan
			$infokegiatan = new Infokegiatan;
			$infokegiatan->savewith($pelkegiatan->id, $kalendar_id);
		}

		foreach ($perka->kegiatannotfinal() as $kegiatan) 
		{
			$title = $kegiatan->title;

			$kegiatan_id = $kegiatan->id;
		}

		//input nama kegiatan sama dengan nama kegiatan yang belum final di database
		if($title!=$nama)
		{		
			$validNama = Validator::make(array('nama' => $nama), array('nama' => 'exists:kegiatans,title'));
			
			if($validNama->fails())
			{
				foreach ($perka->kegiatannotfinal() as $kegiatan) 
				{
					$kegiatan->title = $nama;
					$kegiatan->save();
				}				
			}	
			else
			{
				$kegiatan = Kegiatan::where('title', $nama)->first();

				$pelkegiatan->kegiatan_id = $kegiatan->id;
				$pelkegiatan->save();
			}		
		}

		$dokumen = Dokumen::find($id);
		$dokumen->status = 1;
		$dokumen->save();		

		//hapus notif
		$dokumen->notifs()->delete();		

		//simpan notif
		$notif = new Notif;
		$notif->dokumen_id = $dokumen->id;
		$notif->user_id = $user->id;
		$notif->save();		

		foreach ($perka->jalurs->pengajuans as $pengajuan) 
		{
			$user = $pengajuan->approver->hakakse->user;

			$notifCount = $user->notifs()->where('dokumen_id', $dokumen->id)->where('user_id', $user->id)->count();

			if($notifCount==0)
			{
				$notif = new Notif;
				$notif->dokumen_id = $dokumen->id;
				$notif->user_id = $user->id;
				$notif->save();		
			}			
		}

		return Redirect::to('/perkas/succes');
	}

	public function postAdd()
	{		
		$id = Input::get('id');
		$jenis = Input::get('jenis');

		$dokumen = new Dokumen;
		$dokumen->savewith($id, 1, 1, $jenis);	

		$dokumen_id = Pelkegiatan::find($id)->dokumens()->max('id');

		copy(public_path().'/pdf/baru.pdf', public_path().'/pdf/'.$dokumen_id.'.pdf');			

		$user = User::find($_COOKIE['user_id']);

		$catatans = $user->catatans()->where('dokumen_id', null)->get();

		//update catatan			
		foreach ($catatans as $catatan) 
		{
			$catatan->dokumen_id = $dokumen_id;
			$catatan->save();	
		}	
		
		//save notif
		$notif = new Notif;
		$notif->dokumen_id = $dokumen_id;
		$notif->user_id = $user->id;
		$notif->save();		

		$perka = $user->hakakses()->where('peran', 2)->first()->perkas;

		foreach ($perka->jalurs->pengajuans as $pengajuan) 
		{
			$user = $pengajuan->approver->hakakse->user;

			$notifCount = $user->notifs()->where('dokumen_id', $dokumen->id)->where('user_id', $user->id)->count();

			if($notifCount==0)
			{
				$notif = new Notif;
				$notif->dokumen_id = $dokumen->id;
				$notif->user_id = $user->id;
				$notif->save();		
			}
		}

		return Redirect::to('/perkas/succes');
	}

	public function postAddedit()
	{		
		$user = User::find($_COOKIE['user_id']);

		$dokumen = Dokumen::find(Input::get('dokumenId'));

		$perka = $dokumen->pelkegiatan->kegiatan->perka;
		
		$dokumen->status = 1;
		$dokumen->save();

		//hapus notif
		$dokumen->notifs()->delete();

		//simpan notif
		$notif = new Notif;
		$notif->dokumen_id = $dokumen->id;
		$notif->user_id = $user->id;
		$notif->save();		

		foreach ($perka->jalurs->pengajuans as $pengajuan) 
		{
			$user = $pengajuan->approver->hakakse->user;

			$notifCount = $user->notifs()->where('dokumen_id', $dokumen->id)->where('user_id', $user->id)->count();

			if($notifCount==0)
			{
				$notif = new Notif;
				$notif->dokumen_id = $dokumen->id;
				$notif->user_id = $user->id;
				$notif->save();		
			}
		}
	
		return Redirect::to('/perkas/succes');
	}

	public function postDownload()
	{
		$pdf = Input::get('pdf');

		return Response::download(public_path().'/pdf/'.$pdf.'.pdf');		
	}	
}