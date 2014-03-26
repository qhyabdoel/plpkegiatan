<?php

class ApproverController extends BaseController 
{	
	public function getIndex()
	{				
		if (isset($_COOKIE["user_id"])) 
		{
			$count = User::find($_COOKIE['user_id'])->hakakses()->count();	

			$notifCount = User::find($_COOKIE['user_id'])->notifs()->count();

			if($count==2)
			{
				setcookie("peran", 3, time()+60*60*24*30, "/");

				return View::make('Approver.beranda2');
			}

			else
			{
				return View::make('Approver.beranda1')->with('count', $notifCount);	
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
			$count = User::find($_COOKIE['user_id'])->hakakses()->count();	

			$notifCount = User::find($_COOKIE['user_id'])->notifs()->count();		

			if($count==2)
			{
				setcookie("peran", 3, time()+60*60*24*30, "/");

				return View::make('Approver.berandasucces2');
			}

			else
			{
				return View::make('Approver.berandasucces1')->with('count', $notifCount);	
			}
		}

		else
		{
			return View::make('User.tidakizin');
		}
	}
}