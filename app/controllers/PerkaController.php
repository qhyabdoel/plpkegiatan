<?php

class PerkaController extends BaseController 
{
	public function getIndex()
	{	
		if (isset($_COOKIE["user_id"])) 
		{
			$user_id = $_COOKIE["user_id"];
			$count = Hakakse::where('user_id', $user_id)->count();

			$notifCount = User::find($user_id)->notifs()->count();

			if($count==2)
			{								
				return View::make('Perka.beranda2');
			}
			else
			{				
				return View::make('Perka.beranda1')->with('count', $notifCount);	
			}
		}

		else
		{
			return View::make('User.tidakizin');
		}				
	}

	public function getSucces()
	{
		if (isset($_COOKIE["user_id"])) 
		{
			$user_id = $_COOKIE["user_id"];
			$count = Hakakse::where('user_id', $user_id)->count();

			$notifCount = User::find($user_id)->notifs()->count();

			if($count==2)
			{								
				return View::make('Perka.berandasucces2');
			}
			else
			{				
				return View::make('Perka.berandasucces1')->with('count', $notifCount);	
			}
		}

		else
		{
			return View::make('User.tidakizin');
		}
	}
}