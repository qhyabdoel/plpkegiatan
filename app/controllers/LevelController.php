<?php

class LevelController extends BaseController
{
	public function getAdd($id)
	{		
		return View::make('Level.add', array('jenis' => Jeni::all(), 'id' => $id));
	}

	public function getAdds($jalurId, $jeniId)
	{
		$level = Jalur::find($jalurId)->pengajuans()->count();

		if($level!=0)
		{
			$level = Jalur::find($jalurId)->pengajuans()->where('jeni_id', $jeniId)->max('level_id')+1;
		}
		else 
		{
			$level = 1;
		}

		$approvers = Approver::all();

		return View::make('Level.adds', array('jalurId' => $jalurId, 'jeniId' => $jeniId, 'level' => $level, 'approvers' => $approvers));	
	}

	public function postAdd()
	{
		$count = Level::where('id', Input::get('level'))->count();

		if($count==0)
		{
			$level = new Level;
			$level->save();
		}

		$pengajuan = new Pengajuan;
		$pengajuan->jalur_id = Input::get('jalurid');
		$pengajuan->level_id = Input::get('level');
		$pengajuan->jeni_id = Input::get('jeniid');
		$pengajuan->approver_id = Input::get('approverid');
		$pengajuan->save();

		return Redirect::to('jalurs');
	}

	public function getCut($jalur_id, $jeni_id)
	{
		$max = Jalur::find($jalur_id)->pengajuans()->where('jeni_id', $jeni_id)->max('id');

		Pengajuan::find($max)->delete();

		return Redirect::to('jalurs');
	}
}