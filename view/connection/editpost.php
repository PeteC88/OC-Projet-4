<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Edit Post</title>
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

<form name="formulaire" id="formulaire" action="index.php?action=editPost" method="post">
<input type="hidden" size='3' name="id" value="<?= $post['id'] ?>" />
<label for="titre">Titre :</label><textarea name="title"><?= $post['title']?></textarea>
<br />
<textarea rows="15" cols="100" name="content"><?= $post['content']  ?></textarea><br />
<input type="submit" name="modifier" value="Modifier !">
</form>

<!--<?php /*require('../frontend/template.php')*/;?>-->

</body>
</html>
