<?php

class CatatanController extends BaseController 
{	
	public function postAdd()
	{	
		$id = Input::get('id');	
		
		if ($id == 0) 
		{
			$id = null;
		}

		$getCatatan = Input::get('catatan');
		$user_id = 	$_COOKIE['user_id'];
		$user_name = User::find($user_id)->name;				

		//set waktu code
		$waktu = date('d-m-Y H:i');

		//save code
		$catatan = new Catatan;
		$catatan->user_id = $user_id;		
		$catatan->isi = $getCatatan;
		$catatan->dokumen_id = $id;
		$catatan->save();

		//json code
		return Response::json(array('user_name' => $user_name, 
			'waktu' => $waktu, 
			'getCatatan' =>$getCatatan));				
	}
}