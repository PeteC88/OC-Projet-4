<?php
require('loginserv.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Mon premier espace membre en PHP</title>
        <meta charset="utf-8">
    </head>
    <body>
        <div align="center">
            <h2>Connexion</h2>
            <br /><br />

            <form method="POST" action="">
                <input type="email" name="email" placeholder="Mail" / >
                <input type="password" name="password" placeholder="Mot de passe" />
                <input type="submit" name="submit" value="Se Connecter !"/>
            </form>


            <?php
            echo $erreur;
            ?>
        </div>  
    </body>
</html>