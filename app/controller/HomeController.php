<?php
	
	namespace App\Controller;

	use App\Model\User;

	class HomeController
	{
		
		public function index ()
		{

			$users = User::query()->all()->get();

			return view('home', compact('users'));
		}
	}
?>