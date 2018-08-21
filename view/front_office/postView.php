<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<div class="news" style="border-bottom: solid black">
    <h2>
        <?= htmlspecialchars($post['title']) ?>
    </h2>
    <p style="font-size: 15px;">Publié le <?= $post['creation_date_fr'] ?></em><br/>
        Dernière mise à jour le <?= $post['editing_date_fr'] ?></p>
    <p>
        <?= $post['content'] ?>
    </p>
</div>
<br/ >
<div style="border-bottom: solid black">
    <h4>Commentaires</h4>

    <?php
    foreach ($comments as $comment)
    {
    ?>
        <p style="color: #0085a1">Par <strong><?= htmlspecialchars($comment['author']) ?></strong> ,ajouté le <?= $comment['comment_date_fr'] ?></p>
        <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
       
        <?php
        if($comment['reported_comment'] == 1){

         echo '<p style="color: green; background-color: #b3ffd9; width: 100%; border-radius: 10px; text-align: center"> Le commentaire a bien été signalé </p>';
        }
          ?>
        <form action="index.php?action=reportComment" method="post">
        <input type="hidden" name="commentId" value="<?= $comment['id'] ?>" />
        <input type="hidden" name="postId" value="<?= $comment['post_id'] ?>" />
        <input class="btn" type="submit" name="reportPost" onclick="return confirm('Voulez vous vraiment signaler ce commentaire?')" value="signaler commentaire">
        </form>

    <?php
    }
    ?>
    
<br /><br />
</div>
<br />
<h4>Ajouter un nouveau commentaire</h4>
<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
    
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-default">Nom :</span>
      </div>
      <input type="text" id="author" name="author" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" required="author">
    </div>
    <br />
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text">Commentaire : </span>
      </div>
      <textarea id="comment" name="comment" rows="3" class="form-control" aria-label="Texte : " required="comment"></textarea>
    </div>  
    <br />
    <div>
        <input class="btn" type="submit" value="Publier" />
    </div>
    
</form>
<?php $content = ob_get_clean(); ?>

<?php require(FRONT_OFFICE_VIEW_PATH . 'templatePost.php'); ?>