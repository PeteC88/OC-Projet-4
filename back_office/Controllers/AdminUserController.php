<?php

class AdminUserController
{

	public function signIn()
	{
		ini_set('display_errors', 1); 
		error_reporting(E_ALL);

		$erreur = "";
		    //connexion à la base de donnée

		if(isset($_POST['submit']))
		{
		     $email = $_POST['email'];
		     $password = $_POST['password'];
		     if(!empty($email) AND !empty($password))
            {
                    $userModel = new userModel(); 
                    if($user = $userModel->getUser($email, $password))
                    {
                        $sessionAdmin = new SessionAdmin();
                        $sessionAdmin->connect($user);

                        header("Location: index.php?action=adminAll"); //ridirezione verso il profilo della persona. ../view/listPostsView.php
                        
                        exit(); //à mettre à chaque redirection

                    }
                      else
                    {
                        $erreur = "Mauvais mail ou mot de passe";
                    }
                
		    }
		    else
		    {
		        $erreur = "Tous les champs doivent etre complétes";
		    } 
            
            require (CONNECTION_VIEW_PATH . 'connect.php');
		} 
		else
		{
			require (CONNECTION_VIEW_PATH . 'connect.php');
		}
	}	

	public function signOut()
	{
		$sessionAdmin = new sessionAdmin();

		$sessionAdmin->deconnect();

		header("Location: index.php?action=adminUserConnect");

	}		
}