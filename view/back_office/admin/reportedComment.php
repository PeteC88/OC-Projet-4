<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Commentaires Signalés</title>
	<link href="../public/css/stylesheet.css" rel="stylesheet" />
</head>
<body>
	<h1>Page de l'Admin</h1>
	<a id="logout" href="index.php?action=adminUserDeconnect">Deconnexion</a>
    <br/>
    <br/>
    <em><a href="index.php?action=all"> voir tous les post</a></em> 

<h1>Commentaires signalés !</h1>
<?php
while ($comment = $comments->fetch())
{
?>
    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
    <em><a href="index.php?action=adminRemoveComment&amp;id=<?= $comment['id']?>">Supprimer le commentaire</a></em>
<?php
}
?>
</body>
</html>

<!--faire une fonction get reported comment-->