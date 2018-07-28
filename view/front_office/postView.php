<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>

<h1>Mon super blog !</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>

<div class="news">
    <h3>
        <?= htmlspecialchars($post['title']) ?>
        <em>le <?= $post['creation_date_fr'] ?></em>
    </h3>
    
    <p>
        <?= nl2br(htmlspecialchars($post['content'])) ?>
    </p>
</div>

<h2>Commentaires</h2>

<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
    <div>
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" />
    </div>
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<?php
foreach ($comments as $comment)
{
?>
    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
    <?php
    if($comment['reported_comment'] == 1){

     echo 'Le commentaire a bien été signalé';
    }
    ?>
    <form action="index.php?action=reportComment" method="post">
    <input type="hidden" name="commentId" value="<?= $comment['id'] ?>" />
    <input type="hidden" name="postId" value="<?= $comment['post_id'] ?>" />
    <input type="submit" name="reportPost" value="signaler commentaire">
    </form>

<?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require(FRONT_OFFICE_VIEW_PATH . 'template.php'); ?>