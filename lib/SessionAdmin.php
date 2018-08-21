<?php

Class SessionAdmin 
{
	function __construct()
	{
		if(session_status() == PHP_SESSION_NONE)
		{
			session_start();
		}
	}

	//to empty the var of the session
	function deconnect()
	{
		//user is a key who mantain the informations about the user
		$_SESSION['user'] =  array(); //There is nothing in the array to indicate that the vars are empty

		session_destroy();
	}

	function connect($user)
	{
		//Save the datas of users in the session.
		$_SESSION['user'] = $user;
	} 


	function isConnected()
	{
		if(array_key_exists('user', $_SESSION))
		{
			if(isset($_SESSION['user']))
			{
				return true;
			}
		}
		 return false;
	}
}
