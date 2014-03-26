<?php

class UserController extends BaseController 
{
	public function getLoginReveal()
	{
		return View::make('User.login');		
	}

	public function getIndex()
	{
		$users = User::all();

		return View::make('User.index')->with('users', $users);		
	}

	public function getAdd()
	{
		return View::make('User.add');
	}

	public function getEdit($id)
	{
		$user = User::find($id);		

		return View::make('User.add', array('user' => $user));
	}

	public function postSimpan()
	{
		//save user
		$user = new User;
		$user->name = Input::get('username');
		$user->email = Input::get('email');
		$user->password = Hash::make(Input::get('password'));
		$user->save();

		foreach (Input::get('peran') as $peran) 
		{
			//save hakakse
			$hakakse = new Hakakse;
			$hakakse->user_id = User::max('id');
			$hakakse->peran = $peran;
			$hakakse->save();

			if($peran==2)
			{
				$perka = new Perka;
				$perka->hakakse_id = Hakakse::max('id');	
				$perka->save();
			}
			elseif ($peran==3) 
			{
				$approver = new Approver;
				$approver->hakakse_id = Hakakse::max('id');
				$approver->save();
			}
			elseif ($peran==1) 
			{
				$admin = new Admin;
				$admin->hakakse_id = Hakakse::max('id');
				$admin->save();
			}
		}

		return Redirect::to('users');
	}

	public function postEdit()
	{
		$id = Input::get('id');

		$perans = Input::get('peran');

		$user = User::find($id);
		$user->name = Input::get('username');
		$user->email = Input::get('email');		
		$user->save();

		$perkas = $user->hakakses()->where('peran', 2);
		$admins = $user->hakakses()->where('peran', 1);
		$approvers = $user->hakakses()->where('peran', 3);

		if(!is_null($perans))
		{			
			if($perkas->count()==0)
			{
				if(in_array(2, $perans))
				{
					//simpan hakakse
					$hakakse = new Hakakse;
					$hakakse->user_id = $user->id;
					$hakakse->peran = 2;
					$hakakse->save();

					$perka = new Perka;
					$perka->hakakse_id = Hakakse::max('id');
					$perka->save();
				}
			}
			else
			{
				if(!in_array(2, $perans))
				{
					$perkas->first()->delete();
				}			
			}

			if($approvers->count()==0)
			{
				if(in_array(3, $perans))
				{
					//simpan hakakse
					$hakakse = new Hakakse;
					$hakakse->user_id = $user->id;
					$hakakse->peran = 3;
					$hakakse->save();

					$approver = new Approver;
					$approver->hakakse_id = Hakakse::max('id');
					$approver->save();
				}
			}
			else
			{
				if(!in_array(3, $perans))
				{
					$approvers->first()->delete();
				}			
			}

			if($admins->count()==0)
			{
				if(in_array(1, $perans))
				{
					//simpan hakakse
					$hakakse = new Hakakse;
					$hakakse->user_id = $user->id;
					$hakakse->peran = 1;
					$hakakse->save();
				}
			}
			else
			{
				if(!in_array(1, $perans))
				{
					$admins->first()->delete();
				}			
			}		
		}
		else
		{
			$user->hakakses()->delete();
		}

		return Redirect::to('users');
	}

	public function postLogin()
	{		
		$name=Input::get("name");
		$password=Input::get("password");

		if (Auth::attempt(array('name' => $name, 'password' => $password)))
		{										
			$user = User::where('name', $name)->first();		
			$count = $user->hakakses->count();
			$peran = $user->hakakses->first()->peran;
						 
			setcookie("user_id", $user->id, time()+60*60*24*30, "/");
						
			if($count==1)
			{
				if ($peran==1)
				{
					return Redirect::to('admins');
				}
				
				elseif ($peran==2) 
				{										
					return Redirect::to('perkas');
				}
				
				elseif ($peran==3) 
				{
					return Redirect::to('approvers');
				}
			}

			else
			{
				return Redirect::to('hakakses');
			}				   	
		}

		else
		{
			return View::make('User.gagallogin');
		}
	}

	public function getLogout()
	{
		setcookie("user_id", "", time()-60*60*24*30, '/');
		
		return Redirect::to('/');
	}	

	public function getHapus($id)
	{
		return View::make('User.hapus')->with('id', $id);
	}

	public function postHapus()
	{
		$user = User::find(Input::get('id'));		
		$user->delete();

		return Redirect::to('users');	
	}
}