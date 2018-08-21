<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Commentaires Signalés</title>
</head>
        <!-- Page Header -->
    <header class="masthead" style="background-image: url('public/thème/img/comments_2.jpg')">
            <div class="site-heading">
              <h1 id="comments" style="text-shadow: black 1px 1px, black -1px 1px, black -1px -1px, black 1px -1px;">Commentaires Signalés</h1>
            </div>
    </header>
<?php ob_start(); ?>
<body>
<?php
while ($comment = $comments->fetch())
{
?>
<div style="margin-left: 10px;">
    <p>Par <strong><?= htmlspecialchars($comment['author']) ?></strong>, publié le <?= $comment['comment_date_fr'] ?></p>
    <p style="color: red"><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
      
    <a style="text-decoration: none" href="index.php?action=adminRemoveComment&amp;id=<?= $comment['id']?>" onclick="return confirm('Voulez vous vraiment supprimer ce commentaire?')">        
    <input type="button" class="btn" value="Supprimer le commentaire" /></a>
</div>
<?php
}
?>
<?php $content = ob_get_clean(); ?>
</body>
</html>

<?php require(ADMIN_VIEW_PATH . 'templateAdmin.php'); ?>
