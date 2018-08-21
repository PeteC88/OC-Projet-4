<!DOCTYPE html>
<html>
    <head>
        <title>Connexion</title>
        <meta charset="utf-8">
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->
    <link href="public/thème/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="public/thème/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="public/thème/css/clean-blog.min.css" rel="stylesheet">

    <body style="background-image: url('public/thème/img/home-bg.jpg')">
        <div align="center">
            <br /><br /><br /><br /><br /><br />
            <h2>Connexion</h2>
            <br /><br />

            <form class="form-inline" style="display: flex; justify-content: center;"  method="POST" action="index.php?action=userConnect">
               
                <label class="sr-only" for="inlineFormInputGroup">E-mail</label>
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <input type="email" name="email" class="form-control" id="inlineFormInputGroup" placeholder="E-mail">
                    </div>

                 <label class="sr-only" for="inlineFormInput">Name</label>
                <input type="password" name="password" class="form-control mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" placeholder="Mot de passe">
                <br />
                <br />
                <input style="border: solid grey" type="submit" name="submit" class="btn" value="Se Connecter"/>
            </form>
            <br /><br />
            <a class="nav-link" style="color: black" href="index.php">Visite le blog</a>


           <?php
            if(isset($erreur))
            {
               echo '<div style="color: red; background-color: #F6CECE; width: 300px; border-radius: 10px">' . $erreur . '</div>';   
            }
            ?> 
        </div>  
    </body>
</html>