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

	function deconnect()
	{
		//per svuotare le variabili dalla sessione
		//User è una chiave e serve per conservare le informazioni sull'utilizzatore
		$_SESSION['user'] =  array(); //Non mettiamo nulla per indicare che le variabili sono vuote

		session_destroy();
	}

	function connect($user)
	{
		$_SESSION['user'] = $user;
	} //Salviamo nella sessione i dati dell'utilizzatore


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

//methode 
//dans la session admin, fare un metodo per connettere l'utilizzatore

//un metodo per deconnecter

//un metodo se l'utilizzatore è già connesso

