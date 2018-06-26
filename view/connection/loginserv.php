<?php
session_start();

ini_set('display_errors', 1); 
error_reporting(E_ALL);

$erreur = "";
    //connexion à la base de donnée
 try
{
    $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

if(isset($_POST['submit']))
{
     $email = htmlspecialchars($_POST['email']);
     $password = $_POST['password'];
     if(!empty($email) AND !empty($password))
    {
        $requser = $db->prepare("SELECT * FROM connexion WHERE email = '$email' AND password = '$password'");
        $requser->execute(array($email, $password));
        $userexist = $requser->rowCount();
        if($userexist == 1)
        {
            
            header("Location: ../../index.php?action=all"); //ridirezione verso il profilo della persona. ../view/listPostsView.php

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
}
?>
