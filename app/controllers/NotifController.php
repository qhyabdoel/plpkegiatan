<?php

class NotifController extends BaseController 
{
	public function getIndex()
	{	
		$notifs = User::find($_COOKIE['user_id'])->notifs()->orderBy('created_at', 'desc')->get();

		$hakakses = User::find($_COOKIE['user_id'])->hakakses;

		$count = $hakakses->count();

		if($count==1)
		{
			$peran = $hakakses->first()->peran;

			if($peran==2)
			{			
				return View::make('Notif.indexper')->with('notifs', $notifs);
			}
			elseif ($peran==3) 
			{
				$approver_id = $hakakses->first()->approvers->id;

				return View::make('Notif.indexapp',array('notifs' => $notifs, 'approver_id' => $approver_id));
			}
		}
		else
		{
			$approver_id = User::find($_COOKIE['user_id'])->hakakses()->where('peran', 3)->first()->approvers->id;			

			$perka_id = User::find($_COOKIE['user_id'])->hakakses()->where('peran', 2)->first()->perkas->id;			

			return View::make('Notif.index2',array('notifs' => $notifs, 'approver_id' => $approver_id, 'perka_id' => $perka_id));
		}		
	}

	public function getHalaman()
	{
		return View::make('Notif.halaman');
	}
}