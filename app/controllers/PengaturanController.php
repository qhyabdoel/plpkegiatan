<?php

class PengaturanController extends BaseController
{
	public function getIndex()
	{
		return View::make('Pengaturan.index');
	}
}