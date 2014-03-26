<?php

class KalendarController extends BaseController 
{
	public function getIndex()
	{		
		if(isset($_COOKIE['user_id']))
		{
			$admin = User::find($_COOKIE['user_id'])->hakakses()->where('peran', 1)->count();
		}		
		else
		{
			$admin = 0;
		}

		if($admin==0)
		{
			return View::make('Kalendar.kalendar');
		}		
		else
		{
			return View::make('Kalendar.kalendaradmin');
		}
	}

	public function getKalendar()
	{
		if(isset($_COOKIE['user_id']))
		{
			$admin = User::find($_COOKIE['user_id'])->hakakses()->where('peran', 1)->count();
		}		
		else
		{
			$admin = 0;
		}

		$kalendars = Kalendar::all();

		if($admin==0)
		{
			return View::make('Kalendar.kalendar2')->with('kalendars', $kalendars);
		}		
		else
		{
			return View::make('Kalendar.kalendaradmin2')->with('kalendars', $kalendars);
		}			
	}

	public function getShow($id)
	{
		$kalendar = Kalendar::find($id);
		
		return View::make('Kalendar.show')->with('kalendar', $kalendar);
	}
}