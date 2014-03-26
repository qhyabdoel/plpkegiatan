<?php

class Notif extends Eloquent
{
	public function dokumen()
	{
		return $this->belongsTo('Dokumen');
	}

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function email($dokumen_id,$user_id)
	{
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

		$user = User::find($user_id);				
		$dokumen = Dokumen::find($dokumen_id);		

		$jenis = $dokumen->jeni->nama;
		$kegiatan = $dokumen->pelkegiatan->kegiatan->title;

		$approverDo = $dokumen->pelkegiatan->kegiatan->perka->jalurs->pengajuans()
		->where('jeni_id', $dokumen->jeni_id)
		->where('level_id', $dokumen->level->id)->first()->approver;

		$approver = $approverDo->hakakse->user->name;

		if($user->hakakses()->where('peran', 2)->count()!=0)
		{
			$perka = $user->hakakses()->where('peran', 2)->first()->perkas;		
		}		

		if($user->hakakses()->where('peran', 3)->count()!=0)
		{
			$approverUs = $user->hakakses()->where('peran', 3)->first()->approvers;
		}		
		
		$perkaDo = $dokumen->pelkegiatan->kegiatan->perka->id;

		$perkaName = $dokumen->pelkegiatan->kegiatan->perka->hakakse->user->name;

		if(isset($perka) && $perka->id==$perkaDo)
		{			
			if($dokumen->status==0)
			{
				$link = 'http://www.plpkegiatan.local/kegiatans/edit/'.$dokumen->id;
				
				$message = '<a href="'.$link.'">Dokumen <b>'.$jenis.'</b> kegiatan <b>'.$kegiatan.'</b> 
				tidak disetujui oleh <b>'.$approver.'</b>. 
				Klik link ini untuk memperbaikinya!</a>';			
			}
			elseif($dokumen->status==1)
			{
				$message = 'Dokumen <b>'.$jenis.'</b> kegiatan <b>'.$kegiatan.'</b> telah diajukan kepada <b>'.$approver.'</b>.';
			}
			elseif($dokumen->status==2) 
			{
				$link = 'http://www.plpkegiatan.local/kegiatans/add/baru';

				$message = '<a href="'.$link.'">Dokumen <b>'.$jenis.'</b> kegiatan <b>'.$kegiatan.'</b> 
				telah disetujui oleh <b>'.$approver.'</b>. Klik link ini untuk membuat dokumen baru!</a>';
			}
			elseif ($dokumen->status==3) 
			{
				$message = 'Dokumen <b>'.$jenis.'</b> kegiatan <b>'.$kegiatan.'</b> telah disetujui oleh <b>'.$approver.'</b>. 
				anda dapat mengajukan pelaksanaan baru untuk kegiatan ini';
			}
		}
		else
		{
			if($dokumen->status==0)
			{				
				if($approverUs->id==$approverDo->id)
				{
					$message = 'Anda telah menolak dokumen kegiatan berupa <b>'.$jenis.'</b> 
					yang dikirimkan oleh <b>'.$perkaName.'</b>.';
				}
				else
				{
					$message = '<b>'.$approver.'</b> telah menolak dokumen kegiatan berupa <b>'.$jenis.'</b> 
					yang dikirimkan oleh <b>'.$perkaName.'</b> .';
				}
			}
			elseif($dokumen->status==1)
			{
				if($approverUs->id==$approverDo->id)
				{
					$link = 'http://www.plpkegiatan.local/kegiatans/approve/'.$dokumen->id;

					$message = '<a href="'.$link.'""><b>'.$perkaName.'</b> 
					mengirimkan dokumen kegiatan berupa <b>'.$jenis.'</b>. 
					Klik link ini untuk melakukan pengujian dokumen!</a>';
				}
				else
				{
					$message = '<b>'.$perkaName.'</b> 
					mengirimkan dokumen kegiatan berupa <b>'.$jenis.'</b>
					kepada <b>'.$approver.'</b>';
				}
			}
			elseif($dokumen->status==2)
			{
				if($approverUs->id==$approverDo->id)
				{
					$message = 'Anda telah menyetujui dokumen kegiatan berupa '.$jenis.'</b> 
					yang dikirimkan oleh <b>'.$perkaName.'</b> .';
				}
				else
				{
					$message = '<b>'.$approver.'</b> telah menyetujui dokumen kegiatan berupa <b>'.$jenis.'</b> 
					yang dikirimkan oleh <b>'.$perkaName.'</b> .';
				}	
			}
			else
			{
				if($approverUs->id==$approverDo->id)
				{
					$message = 'Anda telah menyetujui dokumen kegiatan berupa '.$jenis.'</b> 
					yang dikirimkan oleh <b>'.$perkaName.'</b> .';
				}
				else
				{
					$message = '<b>'.$approver.'</b> telah menyetujui dokumen kegiatan berupa <b>'.$jenis.'</b> 
					yang dikirimkan oleh <b>'.$perkaName.'</b> .';
				}		
			}
		}

		mail($user->email, 'Notifikasi LPKIA', $message, $headers);
	}
}