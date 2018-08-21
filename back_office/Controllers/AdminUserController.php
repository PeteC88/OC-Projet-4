<?php

class AdminUserController
{

	public function signIn()
	{
		$erreur = "";
		if(isset($_POST['submit']))
		{
		     $email = $_POST['email'];
		     $password = $_POST['password'];
		     if(!empty($email) AND !empty($password))
            {
                    $userModel = new UserModel(); 
                    if($user = $userModel->getUser($email, $password))
                    {
                        $sessionAdmin = new SessionAdmin();
                        $sessionAdmin->connect($user);

                        header("Location: index.php?action=adminAll"); 
                        
                        exit();

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
		exit();

	}		
}