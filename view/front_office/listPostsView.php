<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p>Derniers billets du blog :</p>
<a href="index.php?action=userConnect">Connexion</a>
<div><img alt="writer" src="http://www.lorenzomarone.net/wp-content/uploads/2014/12/scrittore-981x540.jpg"></div>

<?php
foreach ($post as $data) 
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
?>
<?php $content = ob_get_clean(); ?>

<?php require(FRONT_OFFICE_VIEW_PATH . 'template.php'); ?>