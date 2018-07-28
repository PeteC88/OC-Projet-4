<?php ob_start(); ?>
<h1>Ma Page Admin !</h1>
<p> Tous les billets du blog :</p>

<em><a href="index.php?action=all">voir tous les post</a></em>

<div><img alt="writer" src="http://www.lorenzomarone.net/wp-content/uploads/2014/12/scrittore-981x540.jpg"></div>

<?php
while ($data = $all->fetch())
{
?>
    <div class="news">
        <h3>
            <?= ($data['title']) ?>
            <em>le <?= $data['creation_date_fr'] ?></em>
        </h3>
        
        <p>
            <?= nl2br(($data['content'])) ?>
            <br />
            <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
        </p>
    </div>
<?php
}
$all->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require(FRONT_OFFICE_VIEW_PATH . 'template.php'); ?>