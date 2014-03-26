<?php

class HakakseController extends BaseController {		

	public function getIndex()
	{
		$user_id = $_COOKIE["user_id"];
		$hakakses = User::find($user_id)->hakakses()->get();		
		$count = $hakakses->count();
		$notifCount = User::find($user_id)->notifs()->count();
		
		if ($count==2) 
		{			
			return View::make('Hakakse.beranda', array('hakakses' => $hakakses, 'count' => $notifCount));	
		}		
		
		else
		{
			return View::make('User.tidakadahal');
		}
	}	

}