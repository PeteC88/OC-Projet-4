<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Admin WISIWYG</title>
	<link href="../public/css/stylesheet.css" rel="stylesheet" />
    <script src="tinymce/tinymce.js" language="javascript" type="text/javascript">
    </script>
    <script language="javascript" type="text/javascript">
        tinyMCE.init({
        mode : "textareas"
        });
    </script>
</head>
<body>
	<h1>Page de l'Admin</h1>
	<a id="logout" href="view/connection/deconnexion.php">Deconnexion</a>
	<!--<?php $addedpost ?> -->

<h1>Ma Page Admin !</h1>
<p> Ajouter un nouveau post :</p>

<em><a href="index.php?action=all"> voir tous les post</a></em>
<br />
<br />
<form name="formulaire" id="formulaire" action="index.php?action=addPost" method="post">
        <label for="titre" >Titre : </label>
        <textarea id="titre" name="titre"></textarea>
        <br />
        <br/>
        <label for="texte"> Texte : </label>
        <textarea id="texte" name="texte" rows="25" ></textarea>
        <div>
            <input type="submit" />
        </div>
 </form>


	</body>
</html>

<!--requete sql qui va recuperer l'entier des chapitre et faire un for each pour parcourir mon tableau