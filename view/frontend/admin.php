<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Admin</title>
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
    <br />
    <br />
    <a id="logout" href="index.php?action=addPost">Ajouter un nouveau post</a>
    <br />
    <br />
    <a id="commentaires_signalés" href="index.php?action=showReportedComment">Commentaires Signalés</a>

<?php ob_start(); ?>
<h1>Ma Page Admin !</h1>
<p> Tous les billets du blog :</p>

<em><a href="../../index.php?action=all">voir tous les post</a></em>

<div><img alt="writer" src="http://www.lorenzomarone.net/wp-content/uploads/2014/12/scrittore-981x540.jpg"></div>

<?php
foreach($all as $data) //foreach($all as $data);
//foreach bouche like while but it works only on arrays,  raccoglie tutti i dati e li dispaccia
{
?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data['title']) ?>
            <em>le <?= $data['creation_date_fr'] ?></em>
        </h3>
        
        <p>
            <?= nl2br(htmlspecialchars($data['content'])) ?>
            <br />
            <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
            <em><a href="index.php?action=editPost&amp;id=<?= $data['id'] ?>">Editer le billet</a></em>
            <em><a href="index.php?action=removePost&amp;id=<?= $data['id']?>">Supprimer le billet</a></em>
        </p>
    </div>
<?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>


	</body>\
</html>
