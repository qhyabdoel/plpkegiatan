<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('beranda');
});

Route::controller('users', 'UserController');

Route::controller('hakakses', 'HakakseController');

Route::controller('admins', 'AdminController');

Route::controller('perkas', 'PerkaController');

Route::controller('approvers', 'ApproverController');

Route::controller('kegiatans', 'KegiatanController');

Route::controller('pelkegiatans', 'PelkegiatanController');

Route::controller('kalendars', 'KalendarController');

Route::controller('dokumens', 'DokumenController');

Route::controller('catatans', 'CatatanController');

Route::controller('notifs', 'NotifController');

Route::controller('infokegiatans', 'InfokegiatanController');

Route::controller('infolains', 'InfolainController');

Route::controller('jalurs', 'JalurController');

Route::controller('levels', 'LevelController');

Route::controller('jenis', 'JeniController');

Route::controller('pengaturans', 'PengaturanController');

Route::get('add', function()
{				
	
});

Route::get('coba', function()
{			
	echo Jeni::max('level');
});

Route::get('email', function()
{
	
});

Route::get('delete', function()
{		
	$infokegiatans = Infokegiatan::where('id', '>', 0);
	$kalendars = Kalendar::where('id', '>', 0);
	$dokumens = Dokumen::where('id', '>', 0);
	$pelkegiatans = Pelkegiatan::where('id', '>', 0);
	$kegiatans = Kegiatan::where('id', '>', 0);

	$infokegiatans->delete();
	$kalendars->delete();
	$dokumens->delete();
	$pelkegiatans->delete();
	$kegiatans->delete();
});

Route::get('tes', function()
{
	echo User::find(13)->hakakses->delete();
});