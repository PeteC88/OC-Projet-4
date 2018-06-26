<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Admin WISIWYG</title>
	<link href="../public/css/stylesheet.css" rel="stylesheet" />
	<script src="../public/js/editeur.js"></script>
</head>
<body>
	<h1>Page de l'Admin</h1>
	<a id="logout" href="deconnexion.php">Deconnexion</a>
	<!--<?php $addedpost ?> -->
	<br />
	<br />
	<br />
	 <input type="button" value="G" style="font-weight:bold;" onclick="commande('bold');" > 
	 <input type="button" value="I" style="font-style:italic;" onclick="commande('italic')" /> 
	 <input type="button" value="S" style="text-decoration:underline;" onclick="commande('underline')" /> 
	 <input type="button" value="Lien" onclick="commande('createLink');" >
	 <input type="button" value="Image" onclick="commande('insertImage');" >
	 <select onchange="commande('heading', this.value); this.selectedIndex = 0;">
	<option value="">Titre</option>
	<option value="h1">Titre 1</option>
	<option value="h2">Titre 2</option>
	<option value="h3">Titre 3</option>
	<option value="h4">Titre 4</option>
	<option value="h5">Titre 5</option>
	<option value="h6">Titre 6</option>
</select>
	 <br />
	 <br />
	 <div id="editor" contentEditable ></div> 
	 <?= $content ?>

</body>\
</html>
