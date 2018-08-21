<!DOCTYPE html>
<html>
<head>
  <title>Espace Admin Blog Jean Forteroche</title>
</head>
<body>
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('public/thème/img/writer.jpg')">
            <div class="site-heading">
              <h1>Page de l'Admin</h1>
              <span class="subheading">Ici vous pouvez ajouter, modifier ou supprimer des billets</span>
            </div>
    </header>

<?php ob_start(); ?>

<?php
foreach($all as $data) 
{
?>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-preview">
            <a href="index.php?action=adminPost&amp;id=<?= $data['id'] ?>">
              <h2 class="post-title">
                <?= ($data['title']) ?>
                </h2>
              <h3 class="post-subtitle">
                <?= strip_tags(substr($data['content'], 0, 200), '<br> <em> <strong>' ) ?>...
              </h3>
            </a>
            <p class="post-meta"> Publié le <?= $data['creation_date_fr'] ?>
            <br />
  
            </p>
              
            <a style="text-decoration: none" href="index.php?action=adminPost&amp;id=<?= $data['id'] ?>"><input type="button" class="btn" value="Voir" /></a>
            <a style="text-decoration: none" href="index.php?action=adminEditPost&amp;id=<?= $data['id'] ?>"><input type="button" class="btn" value="Modifier" /></a>
            <a style="text-decoration: none" href="index.php?action=adminRemovePost&amp;id=<?= $data['id']?>" onclick="return confirm('Voulez vous vraiment supprimer ce post?')"><input type="button" class="btn" value="Supprimer" /></a>
        <br />
        <br />
        <br />
          </div>
        </div>
    </div>
</div>

<?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require(ADMIN_VIEW_PATH . 'templateAdmin.php'); ?>


  </body>\
</html>
